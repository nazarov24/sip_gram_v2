<?php

namespace App\Models;

use App\Models\Car\ClassCar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffClassCar extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'tariff_id',
        "class_car_id",
        "main_class",
        "condition_id",
        "min_count_seat",
        "setting_intercity",
        "age_up_to",
        "width",
        "height",
        "length",
        "carrying_capacity",
        "cargo_properties",
        'created_by',
        'created_by_id'
    ];

    public function tariff()
    {
        return $this->belongsTo(Tariff::class, 'tariff_id', 'id');
    }

    public function class_car() {
        return $this->belongsTo(ClassCar::class, 'class_car_id', 'id');
    }

    public function car_condition() {
        return $this->belongsTo(CarCondition::class, 'condition_id', 'id');
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function dop_conditions() {
        return $this->hasMany(TariffClassCarAdditionally::class, 'tariff_class_car_id', 'id')->where('status',1);
    }
    public function not_dop_conditions() {
        return $this->hasMany(TariffClassCarAdditionally::class, 'tariff_class_car_id', 'id')->where('status',0);
    }

    public function excluded_model_cars() {
        return $this->hasMany(TariffClassCarExcludedModelCar::class, 'tariff_class_car_id', 'id')->with('model_car');
    }
    
}
