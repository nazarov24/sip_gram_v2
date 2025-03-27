<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverProfileType extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'created_user_id',
        'is_active'
    ];

    public $casts = [
        'is_active' => 'boolean'
    ];

    public function created_user() {
        return $this->belongsTo(User::class, 'created_user_id', 'id');
    }
}
