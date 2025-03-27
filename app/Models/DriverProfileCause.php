<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FiltersTrait;

class DriverProfileCause extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'status_id',
        'is_active',
        'created_user_id'
    ];

    public $casts = [
        'is_active' => 'boolean'
    ];

    public function status() {
        return $this->belongsTo(DriverProfileStatus::class, 'status_id', 'id');
    }

    public function created_user() {
        return $this->belongsTo(User::class, 'created_user_id', 'id');
    }
}
