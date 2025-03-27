<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FastAddressCategory extends Model
{
    use HasFactory;
    const NO_CATEGORY = "Без категории";
    protected $connection = 'pgsql';
    protected $fillable = [
    	'name',
        'icon',
        'user_id',
    	'is_active',
        'icon_by_map',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
