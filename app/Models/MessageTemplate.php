<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FiltersTrait;

class MessageTemplate extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql';
    protected $fillable = [
        'title', 
        'description', 
        'type', 
        'created_by',
        'updated_by',];
}
