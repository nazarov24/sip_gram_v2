<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerformerOrder extends Model
{
    use HasFactory;
    use SoftDeletes;
    public const CANCELED = 10;
    protected $connection = 'pgsql';

    const REFUSAL_FROM_AUTO_ASSIGMENT = 13;
    const AUTO_ASSIGMENT = 20;
    const WAIVER_FROM_PERFORMER = 12;

    protected $fillable = [
      'performer_id', 
      'order_id',  
      'status_id',
      'filing_time',
      'end_time',
      'start_filing_time'
    ];
    public function driver() {
        return $this->belongsTo(Performer::class, 'performer_id', 'id');
    }

    public function order() {
      return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function orderActive() : BelongsTo
    {
      return $this->belongsTo(Order::class, 'order_id', 'id')->whereNotIn('status_id', [Order::COMPLETE,Order::CANCELLATION]);
    }
}
