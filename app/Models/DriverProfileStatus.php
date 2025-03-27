<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverProfileStatus extends Model
{
    use HasFactory;
    const ACTIVE = 1;
    const DISABLED = 0;
    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'created_user_id',
        'is_active'
    ];

    public $casts = [
        'is_active' => 'boolean'
    ];

    public function causes() {
        return $this->hasMany(DriverProfileCause::class, 'status_id', 'id');
    }
    public function created_user() {
        return $this->belongsTo(User::class, 'created_user_id', 'id');
    }
}
