<?php

namespace App\Models;

use App\Traits\FiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FastAddress extends Model
{
    use HasFactory;
    public const DISABLED = 0;
    public const ACTIVE = 1;
    public const DUSHANBE_TOP_5_IDS=[11909,11910,11911,11912,11913];
    public const KHUJAND_TOP_5_IDS=[2267,3117,1293,1236,1128];
    protected $connection = 'pgsql';
    protected $table = "fast_addresses";

    public function __construct(array $attributes = [])
    {
        $this->table = DB::connection('mysql_location')->getDatabaseName().'.'.$this->table;
        parent::__construct($attributes);
    }

    protected $fillable = [
        'name',
        'address_id',
        'lng',
        'lat',
        'street_id',
        'category_id',
        'main_entrance',
        'district_id',
        'village_id',
        'is_parent',
        'is_active'
    ];

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function meeteing_points(){
        return $this->hasMany(MeetingPoint::class, 'fast_address_id', 'id');
    }

   
    
    public function category() {
        return $this->belongsTo(FastAddressCategory::class, 'category_id', 'id');
    }
    public function synonyms() {
        return $this->hasMany(FastAddressSynonym::class, 'fast_address_id', 'id');
    }
   
    
}
