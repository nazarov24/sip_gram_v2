<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTariffStatus extends BasicModel
{
    protected $connection = 'pgsql';
    protected $fillable = [
        'type_tariff_id',
        'status_id',
        'sort'
    ];

}
