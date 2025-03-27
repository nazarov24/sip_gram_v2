<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffHasClientPayType extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'tariff_id',
        'pay_type_id',
    ];

    public function tariff()
    {
        return $this->belongsTo(Tariff::class,'tariff_id', 'id');
    }

    public function payType()
    {
        return $this->belongsTo(ClientPayType::class,'pay_type_id', 'id');
    }
}
