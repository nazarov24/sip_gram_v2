<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderIdPush extends Model
{
    const PLAN_SEND = 0;
    const PLAN_SENDING = 1;
    protected $connection = 'pgsql';
    protected $fillable = [
        'order_id',
        'plan_send'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
