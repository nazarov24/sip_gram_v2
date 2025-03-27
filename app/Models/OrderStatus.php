<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    const NEW = 1;
    const DR_APPOINTMENT = 2;
    const DR_PREV_APPOINTMENT = 3;
    const DRIVER_ON_SITE = 4;
    const CLIENT_NOTIFIED = 5;
    const CLIENT_NOT_NOTIFIED = 6;
    const PERFORMING = 7;
    const PERFORMING_WAIT_CLIENT = 8;
    const COMPLATED = 9;
    const CANCELLED = 10;
    const NOT_ISSUED = 11;
    const ORDER_ROLLBACK = 12;
    const CANCEL_AUTO_ASSIGNMENT = 13;
    const ORDER_COMPLATED_24_HOURS = 14;
    const AUTO_ASSIGNMENT = 15;
    const FILING_TIME = 16;
    const ORDER_UPDATED = 17;
    const IVR_CANCELLATION_OFFER = 18;
    protected $connection = 'pgsql';
    protected $fillable = [
        'id',
        'name'
    ];

    public const STATUS_CHANGE_IDS = [self::DRIVER_ON_SITE, self::PERFORMING, self::COMPLATED, self::CANCELLED];
}
