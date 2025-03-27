<?php

namespace App\Models\PhotoControl;

use App\Models\Performer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class PerformerPhotoControl extends Model
{
    const ASSIGNED = 1;
    const ACCEPTED = 2;
    const NOT_ACCEPTED = 3;
    const NOT_CHECKED = 4;
    const DELETE_BY_PERFORMER = 5;
    const UPDATE_BY_EMPLOYEE = 6;
    const REPLACE_BY_EMPLOYEE = 7;
    const AUTO_CLOSE = 8;

    protected $table = 'performer_photo_controls';
    protected $fillable = [
        'status_id',
        'comment',
        'check_user_id',
        'performer_id',
        'performer_assign_p_c_id',
    ];
    protected $connection = 'pgsql';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function status()
    {
        return $this->belongsTo(PhotoControlStatus::class, 'status_id');
    }

    public function check_user()
    {
        return $this->belongsTo(User::class, 'check_user_id');
    }

    public function performer()
    {
        return $this->belongsTo(Performer::class, 'performer_id');
    }

    public function performer_assign_photo_control()
    {
        return $this->belongsTo(PerformerAssignPhotoControl::class, 'performer_assign_p_c_id');
    }
}
