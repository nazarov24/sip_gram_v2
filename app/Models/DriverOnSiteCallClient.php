<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverOnSiteCallClient extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    public const NEW_WORK = 0;
    public const END_WORK = 1;
    protected $fillable = [
        'order_id',
        'phone_number',
        'count',
        'status'
    ];
}
