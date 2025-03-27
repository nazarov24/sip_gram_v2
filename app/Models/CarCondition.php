<?php

namespace App\Models;

use App\Traits\FiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCondition extends Model
{
    protected $connection = 'pgsql';
    public $table = 'car_conditions';
    
    use HasFactory; 

    protected $fillable = [
        'id',
        'name',
        'level',
    ];
}
