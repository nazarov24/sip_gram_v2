<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSetting extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        "division_id",
        "inactivity_before_blocking",
        "inactivity_until_dismissal",
        "long_blocking",
    ];

    public function division() {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
}
