<?php

namespace App\Models;

use App\Traits\FiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarStateStatus extends Model
{
    use HasFactory;
    

    protected $connection = 'pgsql';

    protected $fillable=[
        'car_state_id',
        'state_status_id',
        'driver_tracking_id',
        'performer_balance',
        'model',
        'model_id'
    ];

    public function car_state()
    {
        return $this->belongsTo(CarState::class);
    }

    public function state_status()
    {
        return $this->belongsTo(StateStatus::class,'state_status_id', 'id');
    }

    public function performer_tracking()
    {
        return $this->belongsTo(DriverTracking::class, 'driver_tracking_id','id')->with(['district:id,name,zone_id','village:id,name']);
    }
}
