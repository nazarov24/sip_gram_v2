<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Zone extends Model
{
    use HasFactory;
    public const ACTIVE = 1;
    protected $connection = 'pgsql';
    protected $table = 'zones';

    protected $fillable = [
        'name',
        'village_id',
        'polygon',
        'color',
        'is_active'
    ];

    public function __construct(array $attributes = [])
    {
        $this->table = DB::connection('mysql_location')->getDatabaseName().'.'.$this->table;
        parent::__construct($attributes);
    }

    public function village() {
        return $this->belongsTo(Village::class, 'village_id', 'id')->with('city');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'zone_id', 'id')->with(['addresses']);
    }

    public function zone_districts(){
        return $this->hasMany(District::class, 'zone_id','id')->where('is_active',1);
    }
}