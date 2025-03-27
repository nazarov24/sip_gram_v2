<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffClassCarAdditionally extends Model
{
    use HasFactory;
    public const ENABLED = 1;
    public const DISABLED = 0;
    protected $connection = 'pgsql';
    protected $fillable = [
        'tariff_class_car_id',
        'performer_car_option_id',
        'model_id',
        'model',
        'status'
    ];

    public function option() {
        return $this->belongsTo($this->model, 'model_id', 'id');
    }
}
