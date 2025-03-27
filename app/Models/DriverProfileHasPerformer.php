<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverProfileHasPerformer extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'driver_profile_id',
        'performer_id'
    ];
    public function driverProfile() {
        return $this->belongsTo(DriverProfile::class, 'driver_profile_id', 'id');
    }
    public function performer() {
        return $this->belongsTo(Performer::class, 'performer_id', 'id');
    }
}
