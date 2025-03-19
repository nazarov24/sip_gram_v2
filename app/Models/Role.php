<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission; 
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends SpatieRole
{
    protected $fillable = ['name', 'guard_name'];

    
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'section_role');
    }

    public function subsections()
    {
        return $this->belongsToMany(Subsection::class, 'subsection_role');
    }
}


