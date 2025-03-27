<?php

namespace App\Models\PhotoControl;

use App\Models\Performer;
use App\Models\PerformerTransport;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerformerAssignPhotoControl extends Model
{
    use SoftDeletes;

    const MORPH_TO = [
        'transport' => PerformerTransport::class,
        'performer' => Performer::class
    ];
    protected $connection = 'pgsql';
    protected $fillable = [
        'model_type',
        'model_id',
        'performer_id',
        'type_photo_control_id',
        'performer_p_c_status_id',
        'start_date',
        'end_date',
        'created_by',
        'description'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function photo_control()
    {
        return $this->hasOne(PerformerPhotoControl::class, 'performer_assign_p_c_id', 'id')->latestOfMany();
    }

    public function performer()
    {
        return $this->belongsTo(Performer::class);
    }

    public function performer_photo_control_status()
    {
        return $this->belongsTo(PhotoControlStatus::class, 'performer_p_c_status_id');
    }

    public function type_photo_control()
    {
        return $this->belongsTo(TypePhotoControl::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function performer_transport()
    {
        return $this->morphTo(PerformerTransport::class, 'model_type', 'model_id');
    }

    public function model()
    {
        return $this->morphTo();
    }

    public function scopeSamePerformer($query)
    {
        return $query->where('performer_id', $this->performer_id);
    }
}
