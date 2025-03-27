<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverProfileCar extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'driver_profile_id',
        'car_number',
        'year',
        'model_id',
        'color_id',
    ];

    public function model()
    {
        return $this->belongsTo(Marka::class, 'model_id', 'id');
    }
   
}
