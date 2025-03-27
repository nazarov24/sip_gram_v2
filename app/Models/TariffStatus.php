<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffStatus extends BasicModel
{
    protected $connection = 'pgsql';
    protected $fillable = [
        'tariff_id',
        'status_id',
        'status'
    ];
    public function tariff(){
        return $this->belongsTo(Tariff::class,'tariff_id','id');
    }

    
}
