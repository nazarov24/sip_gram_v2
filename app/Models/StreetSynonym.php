<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreetSynonym extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
    	'street_id',
    	'name',
    	'is_active'
    ];

    public function street()
    {
        return $this->belongsTo(Street::class,'street_id','id');
    }

}
