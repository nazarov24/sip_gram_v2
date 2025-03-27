<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderRoute extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'pgsql';
    protected $fillable = [
        'order_id',
        'wkt',
        'length',
        'time',
        'geometry_str'
    ];

    public function getGeojsonAttribute()
    {
        $geojson = DB::connection($this->connection)->selectOne("SELECT ST_AsGeoJSON(`wkt`) as wkt FROM {$this->table} WHERE id = ?", [$this->id])->wkt;
        return json_decode($geojson,true);
    }

    public function getWktAttribute()
    {
        return DB::connection($this->connection)->select("SELECT ST_AsText(wkt) as wkt FROM {$this->table} WHERE id = ?", [$this->id])[0]->wkt;
    }

    private function decode(string $encoded) : array
    {
        try{
            $points = [];
            $index = 0;
            $lat = 0;
            $lng = 0;
            $length = strlen($encoded);
        
            while ($index < $length) {
                $result = 0;
                $shift = 0;
        
                do {
                    $b = ord($encoded[$index++]) - 63;
                    $result |= ($b & 0x1f) << $shift;
                    $shift += 5;
                } while ($b >= 0x20);
        
                $dlat = ($result & 1) ? ~($result >> 1) : ($result >> 1);
                $lat += $dlat;
        
                $result = 0;
                $shift = 0;
        
                do {
                    $b = ord($encoded[$index++]) - 63;
                    $result |= ($b & 0x1f) << $shift;
                    $shift += 5;
                } while ($b >= 0x20);
        
                $dlng = ($result & 1) ? ~($result >> 1) : ($result >> 1);
                $lng += $dlng;
        
                // Добавляем точку в массив, умножая координаты на 1e-5
                $points[] = [$lng * 1e-5, $lat * 1e-5];
            }

            if(count($points) < 1) {
                return [
                    'error' => 'Empty array!',
                ];
            }
        
            $wkt = array_map(function($value) {
                return round($value[0],7).' '.round($value[1],7);
            },$points);
            return [
                'wkt' => 'LINESTRING('.implode(', ',$wkt).')'
            ];
        }catch(\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function Route($request,$order_id)
    {
        $from_data = $this->get_from_lat_lang_city_id($request);
        $to_data = $this->get_to_lat_lang_city_id($request);
        $from_lat = $from_data["from_lat"];
        $from_lng = $from_data["from_lng"];
        $lng_lat = $to_data["lng_lat"];
        $route = $from_lng . ',' . $from_lat;
        foreach ($lng_lat as $ll) {
            $route .= ';' . $ll["lng"] . ',' . $ll["lat"];
        }
        if ($route) {
            $response = Http::get("https://mroute.gram.tj/route/v1/driving/$route?overview=full&alternatives=true");
            $json = $response->json();
            if (isset($json['routes'][0]['distance'])) {
                $distance = $json['routes'][0]['distance'];
                $distance = round($distance / 1000, 2);
                foreach($json["routes"] as $route) {
                    $decode = $this->decode($route["geometry"]);
                    if(isset($decode["wkt"])) {
                        $valueWktStr = $decode["wkt"];
                        $wkt = DB::raw("ST_GeomFromText('$valueWktStr')");
                        $SaveData = [
                            'geometry_str' => $route["geometry"],
                            "order_id" => $order_id,
                            "wkt" => $wkt,
                            "length" => round($route["distance"]),
                            "time" => round($route["duration"])
                        ];
                        self::updateOrCreate(['order_id' => $order_id],$SaveData);
                    }
                }
            }
        }
    }

    private function get_from_lat_lang_city_id($request)
    {
        $from_lng = 0;
        $from_lat = 0;
        if (isset($request['from_address']['lng']) && isset($request['from_address']['lat'])) {
            $from_lng = $request['from_address']['lng'];
            $from_lat = $request['from_address']['lat'];
        }
        // if (isset($request['search_address_id'])) {
        //     $search_address = SearchAddress::find($request['search_address_id']);
        //     $address_find = $this->get_search_address_find($search_address);
        //     $from_lng = $address_find->lng ?? null;
        //     $from_lat = $address_find->lat ?? null;

        //     //Id city from_city
        //     $from_address_city_id = $address_find->village_id ?? 0;
        // }

        // if (isset($request['from_address'])) {
        //     $from_address = json_decode($request['from_address'], false);
        //     if (isset($from_address)) {
        //         $from_lng = $from_address->lng ?? null;
        //         $from_lat = $from_address->lat ?? null;
        //     }
        // }

        return [
            'from_lng' => $from_lng,
            'from_lat' => $from_lat,
        ];
    }

    protected function get_search_address_find($search_address)
    {
        if($search_address && $search_address->model == "geocode") {
            $address_find = $search_address->geocode_address;
        } elseif ($search_address && $search_address->model === 'address') {
            $address_find = $search_address->address;
        } elseif ($search_address && $search_address->model === 'fast_address') {
            $address_find = $search_address->fast_address;
        } else {
            $address_find = $search_address->address_point;
        }

        return $address_find;
    }

    private function get_to_lat_lang_city_id($request)
    {
        $lng_lat = [];
        if (isset($request['to_addresses'])) {
            // $to_addresses = json_decode($request['to_addresses'], false);
            // $i = 0;
            // foreach ($to_addresses as $to_address) {
            //     if(isset($to_address->search_address_id)) {
            //         $search_address = SearchAddress::find($to_address->search_address_id);
            //         $address_find = $this->get_search_address_find($search_address);
            //         //Longitude and latitude to addresses
            //         $lng_lat[$i]['lat'] = $address_find->lat ?? null;
            //         $lng_lat[$i]['lng'] = $address_find->lng ?? null;
            //         $i++;
            //     }
            // }
           // $to_addresses = json_decode($request['to_addresses'], false);
            $i = 0;
            foreach ($request['to_addresses'] as $toAddress) {
                $lng_lat[$i]['lat'] = $toAddress['lat'];
                $lng_lat[$i]['lng'] = $toAddress['lng'];
                $i++;
            }
        }

        return [
            'lng_lat' => $lng_lat
        ];
    }
}
