<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'is_active',
        'org_type_id',
        'created_by'
    ];

   
    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
