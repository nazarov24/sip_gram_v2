<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateStatus extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    
    const FREE = 'free';
    const SET_OUT = 'set_out';
    const ON_SITE = 'on_site';
    const WAITING_CLIENT = 'waiting_client';
    const ON_WAY = 'on_way';
    const PERFORMING_WAIT_CLIENT = 'performing_wait_client';
    const NOT_PRESCRIBE = 'not_prescribe';
    const CHANGE_CONNECT = 'change_connect';
    const LOST_CONNECT_PERFORMER = 'lost_connect_performer';
    const CHANGE_AUTO_ASSIGN_FILTER = 'change_auto_assign_filter';
    const CHANGE_CITY = 'change_city';
    const OFF = 'not_on_shift';

    public function scopeActive($query)
    {
        return $query->where('is_active',true);
    }
}
