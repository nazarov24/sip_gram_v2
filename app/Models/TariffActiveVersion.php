<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffActiveVersion extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $fillable = [
        'tariff_id',
        'user_id',
        'comment'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function tariff()
    {
        return $this->belongsTo(Tariff::class, 'tariff_id', 'id');
    }
}
