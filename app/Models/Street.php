<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{ 
    use HasFactory;
    const ACTIVE = 1;
    const DISABLED = 0;
    
    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'street_type_id',
        'village_id',
        'is_active'
    ];

    public function getFullNameAttribute(){
        if($this->street_type->name) {
            if($this->street_type->name == "микрорайон") {
                $name = $this->attributes['name'].' '.$this->street_type->name;
            }elseif($this->street_type->name == "квартал"){
                $name = $this->attributes['name'].' '.$this->street_type->name;
            }else{
                $name = $this->street_type->name.' '.$this->attributes['name'];
            }
        }else{
            $name = $this->attributes['name'];
        }
        return $name;
    }
    
    public function getShortNameAttribute(){
        if($this->street_type->short_name) {
            if($this->street_type->name == "микрорайон") {
                $name = $this->attributes['name'].' '.$this->street_type->short_name;
            }elseif($this->street_type->name == "квартал"){
                $name = $this->attributes['name'].' '.$this->street_type->short_name;
            }else{
                $name = $this->street_type->short_name.' '.$this->attributes['name'];
            }
        }elseif($this->street_type->name) {
            if($this->street_type->name == "микрорайон") {
                $name = $this->attributes['name'].' '.$this->street_type->name;
            }elseif($this->street_type->name == "квартал"){
                $name = $this->attributes['name'].' '.$this->street_type->name;
            }else{
                $name = $this->street_type->name.' '.$this->attributes['name'];
            }
        }else{
            $name = $this->attributes['name'];
        }
        return $name;
    }

    public function synonyms(){
        return $this->hasMany(StreetSynonym::class, 'street_id', 'id')->select('street_id','id','name','is_active');
    }

    public function village(){
        return $this->belongsTo(Village::class,'village_id','id')->with('city');
    }

    public function street_type(){
        return $this->belongsTo(StreetType::class,'street_type_id','id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'street_id', 'id');
    }

    
}
