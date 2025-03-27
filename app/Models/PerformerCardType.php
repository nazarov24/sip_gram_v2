<?php

namespace App\Models;

use App\Traits\FiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\FileHelpers;

class PerformerCardType extends Model
{
    use HasFactory;
   
    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'code',
        'user_id'
    ];
}
