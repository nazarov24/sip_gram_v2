<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreetType extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql';
    protected $fillable = [
    	'name',
    	'is_active',
        'short_name',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
