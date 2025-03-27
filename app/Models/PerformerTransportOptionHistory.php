<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerformerTransportOptionHistory extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $connection = 'pgsql';
    protected $table = 'performer_transport_option_histories';
    protected $fillable = [
        'performer_transport_id',
        'option_id',
        'is_check',
        'performer_transport_history_id',
        'performer_transport_option_id'
    ];
    public function transport() {
        return $this->belongsTo(PerformerTransport::class,'performer_transport_id', 'id');
    }
    public function car_option() {
        return $this->belongsTo(CarOption::class, 'option_id', 'id');
    }
}
