<?php

namespace App\Models;

use App\Models\BaseTariff\BaseTariff;

use App\Traits\FiltersTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use function example\retrieveRelated;

class Tariff extends BasicModel
{
    use SoftDeletes;

    public const ACTIVE = 1;
    public const DELETE = 0;
    public const NO_ARCHIVE = 0;
    public const ARCHIVE = 1;
    public const AUTO = 1;
    public const NO_AUTO = 0;

    protected $connection = 'pgsql';
    public $table = 'public.tariffs';

    protected $fillable = [
        'name',
        'division_id',
        'type_tariff_id',
        'sort',
        'created_by',
        'base_tariff_id',
        'is_send_push_new_order',
        'description',
        'is_archive',
        'price_rounding',
        'price_by_performers',
        'radius_auto_assignment',
        'is_active',
        'auto_assignment',
        'seats'
        
    ];

   
    public function division(){
        return $this->belongsTo(Division::class,'division_id','id');
    }

    public function prices(){
        return $this->belongsTo(PriceTariff::class,'id','tariff_id')->where('is_active',PriceTariff::ACTIVE);
    }
    public function allowances(){
        return $this->hasMany(TariffAllowance::class,'tariff_id','id')->where('is_active',TariffAllowance::ACTIVE);
    }

    public function tariffClassCar()
    {
        return $this->hasMany(TariffClassCar::class, 'tariff_id', 'id')->with(['tariff','class_car','car_condition','created_by','dop_conditions']);
    }
   
    public function type_tariff() {
        return $this->belongsTo(TypeTariff::class, 'type_tariff_id', 'id');
    }
    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by', 'id')->with('employee');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::ACTIVE);
    }

    public function scopeInDivision($query,$id)
    {
        return $query->where('division_id', $id);
    }

    public function pay_types()
    {
        return $this->hasMany(TariffPayType::class,'tariff_id', 'id')->whereHas('type');
    }
}
