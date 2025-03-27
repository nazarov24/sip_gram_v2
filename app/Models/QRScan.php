<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRScan extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'ip',
        'user_agent',
        'type',
        'description'
    ];
}
