<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientBalance extends Model
{
    use HasFactory;
    protected $primaryKey = 'client_id';
    protected $connection = 'pgsql';
    protected $table = 'client_balances';
    protected $fillable=[
        'client_id',
        'balance',
        'premium'
    ];
}
