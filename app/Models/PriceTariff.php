<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceTariff extends BasicModel
{
    public const ACTIVE = 1;
    public const DELETE = 0;
    
    protected $fillable = [
        'tariff_id',
        'delivery_price',
        'price_km_intercity',
        'price_km_city',
        'min_price',
        'price_hour',
        'min_penalty',
        'price_advertising',
        'free_waiting_of_client_in_minute',
        'check_in_price',
        'price_by_performers'
    ];
    public function tariff(){
        return $this->belongsTo(Tariff::class,'tariff_id','id');
    }
}
