<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffAllowance extends BasicModel
{
    public const ACTIVE = 1;
    public const DELETE = 0;
    protected $connection = 'pgsql';
    protected $fillable = [
        'tariff_id',
        'allowance_id',
        'sort',
        'price',
        'is_active'
    ];
    public function tariff(){
        return $this->belongsTo(Tariff::class,'tariff_id','id')->where('is_active', self::ACTIVE);
    }
   
}
