<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderCommission extends Model
{
    use HasFactory;
    use SoftDeletes;
    public const PERCENT = 0.08;
    protected $connection = 'pgsql';
    protected $fillable = [
        'percent',
        'deleted_at',
        'user_id'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}