<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsection extends Model
{
    protected $fillable  = ['title', 'component_id'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'subsection_role');
    }

}
