<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverRange extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'driver_range_intervel';
    use HasFactory;
    protected $fillable = ['intervel', 'range'];
}
