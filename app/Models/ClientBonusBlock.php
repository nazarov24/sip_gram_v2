<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientBonusBlock extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'order_id',
        'promocode_usage_id',
        'client_id',
        'amount',
        'status'
    ];
}
