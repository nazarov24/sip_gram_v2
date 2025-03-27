<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffClassCarExcludedModelCar extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $fillable = [
        'tariff_class_car_id',
        'model_car_id'
    ];

    public function model_car() {
        return $this->belongsTo(Marka::class, 'model_car_id', 'id');
    }
}
