<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['title', 'icon'];


    public function subsections()
    {
        return $this->hasMany(Subsection::class);
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'section_role');
    }

    public function menus(){
        return $this->belongsToMany(Menus::class, 'section_menu');
    }
}
