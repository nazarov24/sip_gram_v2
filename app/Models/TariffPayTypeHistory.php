<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffPayTypeHistory extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'step',
        'model_id',
        'model',
        'tariff_pay_type_id',
        'tariff_history_id',
        'pay_type_id'
    ];
}
