<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Village extends Model
{
    use HasFactory;
    const KHUDJAND = "Худжанд";
    const PLACE_NAME = "Душанбе";
    protected $connection = 'pgsql';
    protected $table = 'villages';
    protected $fillable = [
        'name',
        'city_id',
        'polygon',
        'village_type_id',
        'lng',
        'lat',
        'is_active'
    ];
    public function __construct(array $attributes = [])
    {
        $this->table = DB::connection('mysql_location')->getDatabaseName().'.'.$this->table;
        parent::__construct($attributes);
    }
    public function zones() {
        return $this->hasMany(Zone::class, 'village_id','id')->select('id','village_id','name','polygon')->with('districts');
    }

    
    public function village_zones() {
        return $this->hasMany(Zone::class, 'village_id','id')->select('id','village_id','name','polygon')->with('zone_districts')->where('is_active',1);
    }

    
    
}
