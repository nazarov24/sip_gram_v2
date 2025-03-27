<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeTariff extends BasicModel
{
    use HasFactory;

    public const ACTIVE = 1;
    public const DELETED = 0;
    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'division_id',
        'category_tariff_id',
        'code',
        'icon',
        'image',
        'site_show',
        'app_show',
        'category_car_id',
        'dop_info',
        'description_app',
        'client_hint',
        'created_by',
        'is_active'
    ];

    public function category_tariff()
    {
        return $this->belongsTo(CategoryTariff::class, 'category_tariff_id', 'id');
    }
    public function allowances(){
        return $this->hasMany(TypeTariffAllowance::class,'type_tariff_id','id')->where('is_active',TypeTariffAllowance::ACTIVE)->with("allowance")->orderBy('sort');
    }
    public function division() {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
    public function category_car(){
        return $this->belongsTo(CategoryCar::class, 'category_car_id', 'id');
    }
    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by', 'id')->with('employee');
    }

   
}
