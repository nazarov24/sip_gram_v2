<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerActivity extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'type_id',
        'order_id',
        'performer_id',
        'number'
    ];

    public function type()
    {
        return $this->belongsTo(PerformerActivityType::class,'type_id','id');
    }
}
