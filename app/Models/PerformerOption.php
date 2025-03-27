<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerOption extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'is_active',
        'slag'
    ];
}
