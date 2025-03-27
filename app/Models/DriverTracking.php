<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverTracking extends Model
{
    use HasFactory;
    protected $table = "driver_trackings";
    protected $connection = 'pgsql';
    protected $fillable = [
        'performer_id',
        'lng',
        'lat',
        'district_id',
        'village_id'
    ];
    public function district()
    {
        return $this->belongsTo(District::class)->with('zone:id,name');
    }
   
}
