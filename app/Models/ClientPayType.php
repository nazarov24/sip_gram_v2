<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientPayType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'pgsql';
    public const ENABLE = 1;
    public const DISABLE = 0;

    protected $fillable = [
        'client_id', 
        'model_type',
        'model_id',
        'card_type_id',
        'status'
    ];

    public function dc_card() {
        return $this->belongsTo(ClientCard::class,'model_id','id');
    }
   
    public function promocode() {
        return $this->belongsTo(Promocode::class,'model_id','id');
    }
    public function cardType()
    {
        return $this->belongsTo(PerformerCardType::class, 'card_type_id', 'id');
    }
}
