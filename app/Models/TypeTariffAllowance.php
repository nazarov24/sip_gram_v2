<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeTariffAllowance extends BasicModel
{
    public const ACTIVE = 1;
    public const DELETE = 0;
    protected $connection = 'pgsql';
    protected $fillable = [
        'type_tariff_id',
        'allowance_id',
        'is_active',
        'sort'
    ];
    
   
    public function scopeActive($query)
    {
        return $query->where('is_active', self::ACTIVE);
    }
}
