<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerLocation extends Model
{
    use HasFactory;

    protected $table = "performer_locations";
    protected $fillable = [
        'id',
        'performer_id',
        'district_id',
        'village_id',
        'last_village_id',
        'longitude',
        'latitude'
    ];
    protected $connection = 'pgsql';
    protected $primaryKey = 'performer_id';

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function performer()
    {
        return $this->belongsTo(Performer::class, 'performer_id', 'id');
    }

   
}
