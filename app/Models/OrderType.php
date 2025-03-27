<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderType extends BasicModel
{
    const CITY = 1;
    const HOUR = 2;
    const INTER_CITY = 3;
    protected $connection = 'pgsql';
    protected $fillable = [
        'name'
    ];
}
