<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRegister extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'client_registers';

    protected $fillable = [
        'id',
        'phone_number',
        'sms_code',
        'step_1',
        'step_2',
        'step_3',
        'count',
    ];
}
