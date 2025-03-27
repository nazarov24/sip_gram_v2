<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderToAddress extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'order_id',
        'search_address_id',
        'sort'
    ];

    public function search_addresses () {
        return $this->belongsTo(SearchAddress::class, 'search_address_id', 'id')->with(['address', 'fast_address','address_point']);
    }
}
