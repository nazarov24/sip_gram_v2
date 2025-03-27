<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromocodeUsage extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';

    protected $model_name;

    protected $table = 'promocode_usage';

    protected $fillable = [
        'model_type',
        'promocode_id',
        'user_id',
        'premium',
        'bonus_id',
        'order_client',
        'count',
        'status',
        'expires_at'
    ];
    public function promocode()
    {
        return $this->belongsTo(Promocode::class, 'promocode_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id', 'id')->with('order');
    }
    public function performer()
    {
        return $this->belongsTo(Performer::class, 'user_id', 'id')->with('division');
    }
    
}