<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonCancelOrder extends Model
{
    use HasFactory;
    protected const CANCELED = 10;
    protected $connection = 'pgsql';
    protected $table = 'reason_canceled_order';
    protected $fillable = [
        'model_id',
        'order_id',
        'status_id',
        'model_type',
        'reason_cancel_order'
    ];
}
