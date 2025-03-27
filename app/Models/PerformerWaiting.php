<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerWaiting extends Model
{
    use HasFactory;
    protected $table = 'performer_waitings';
    protected $connection = 'pgsql';

    protected $fillable = [
        'order_id',
        'performer_id',
        'start_time',
        'end_time',
        'price'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function performer(){
        return $this->belongsTo(Performer::class);
    }
}
