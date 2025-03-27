<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverProfileSend extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $fillable = [
        'driver_profile_id',
        'driver_profile_status_id',
        'is_send'
    ];

    public function driverProfile()
    {
        return $this->belongsTo(DriverProfile::class);
    }
}
