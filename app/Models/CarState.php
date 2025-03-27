<?php

namespace App\Models;

use App\Traits\FiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarState extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $fillable = [
        'performer_id',
        'performer_transport_id',
        'is_active'
    ];
    public function statuses()
    {
        return $this->hasOne(CarStateStatus::class, 'car_state_id', 'id')->latest();
    }
    public function performer()
    {
        return $this->belongsTo(Performer::class);
    }

    public function performer_transport()
    {
        return $this->belongsTo(PerformerTransport::class);
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
