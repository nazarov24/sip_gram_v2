<?php

namespace App\Models;

use App\Traits\FiltersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public const ALL = "000000000000";
    protected $connection = 'pgsql';
    public const PERFORMER = 'PERFORMER';
    public const CLIENT = 'CLIENT';
    public const ADMIN = 'ADMIN';
    public const EXPIRE_DAYS = 90;
    protected $table = 'promocode';

    protected $fillable = [
        'id',
        'model_type',
        'model_id',
        'promo_code',
        'promocode_type_id',
        'organization_id',
        'division_id',
        'count_activation',
        'created_by_id',
        'created_by',
        'amount',
        'start_time',
        'end_time',
        'is_active',
        'comment',
    ];

    public function promocode_usage()
    {
        return $this->belongsTo(PromocodeUsage::class, 'promocode_id', 'id');
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }
   
   
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }
}