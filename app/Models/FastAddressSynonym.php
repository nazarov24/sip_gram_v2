<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FastAddressSynonym extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
    	'fast_address_id',
    	'name',
    	'is_active'
    ];

    public function fast_address()
    {
        return $this->belongsTo(FastAddress::class, 'fast_address_id','id');
    }
}
