<?php

namespace App\Models\PhotoControl;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PCCommentTemplate extends Model
{
    use SoftDeletes;

    protected $connection = 'pgsql';
    protected $table = 'p_c_comment_templates';
    protected $fillable = [
        'output_comment',
        'p_c_status_id',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function status()
    {
        return $this->belongsTo(PhotoControlStatus::class, 'p_c_status_id');
    }
}
