<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRatingReason extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    public const TYPE = 'CLIENT';
    public const ACTIVE = 1;
    public const DELETED = 0;
    protected $table = 'client_rating_reasons';
    protected $fillable = [
        'name',
        'description',
        'is_active',
        'type',
        'created_by'
    ];
}
