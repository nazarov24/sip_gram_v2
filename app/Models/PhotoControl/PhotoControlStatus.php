<?php

namespace App\Models\PhotoControl;

use Illuminate\Database\Eloquent\Model;

class PhotoControlStatus extends Model
{
    protected $table = 'performer_photo_control_statuses';
    protected $connection = 'pgsql';
    protected $guarded = false;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
