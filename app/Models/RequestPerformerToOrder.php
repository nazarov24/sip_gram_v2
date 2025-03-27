<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestPerformerToOrder extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'pgsql';
    protected $fillable = [
        'performer_id',
        'order_id'
    ];
}
