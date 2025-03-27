<?php

namespace App\Models\PhotoControl;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypePhotoControl extends Model
{
    use SoftDeletes;

    const FOR_CAR_IDS = [7];
    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'description',
        'alias_for_file_name',
        'created_by',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];
}
