<?php

namespace App\Models\PhotoControl;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingAutoAssignPhotoControl extends Model
{
    use SoftDeletes;
    use HasFactory;

    const EVENT_NEW_CAR = 'new_auto';
    const EVENT_NEW_PERFORMER = 'new_performer';
    protected $connection = 'pgsql';
    protected $fillable = [
        'events',
        'day_for_check',
        'type_photo_control_id',
        'created_by',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function type_photo_control()
    {
        return $this->belongsTo(TypePhotoControl::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
