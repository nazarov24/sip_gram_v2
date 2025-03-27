<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffPayType extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'tariff_id',
        'pay_type_id'
    ];

    public function type()
    {
        return $this->belongsTo(PerformerCardType::class,'pay_type_id', 'id');
    }
}
