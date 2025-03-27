<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAllowance extends Model
{
    use HasFactory;

    public const ACTIVE = 1;
    public const DELETE = 0;
    protected $connection = 'pgsql';
    protected $fillable = [
        'order_id',
        'allowance_id',
        'price',
        'is_active'
    ];

    public function allowance(){
        return $this->belongsTo(TariffAllowance::class, 'allowance_id', 'allowance_id')->with('allowance');
    }
}
