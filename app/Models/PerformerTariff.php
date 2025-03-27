<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerTariff extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'performer_id',
        'tariff_id',
        'tariff_class_car_id',
        'is_active'
    ];

    public function tariff() {
        return $this->belongsTo(Tariff::class, 'tariff_id', 'id');
    }
    public function performer() {
        return $this->belongsTo(Performer::class, 'performer_id', 'id');
    }
}
