<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
     protected $table = 'menuses';
    protected $fillable = ['title', 'description'];

    public function sections(){
        return $this->belongsToMany(Section::class, 'section_menu', 'menu_id', 'section_id');
    }
}
