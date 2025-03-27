<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Division extends BasicModel
{
    const ACTIVE = 1;
    const DELETED = 0;
    const GRAM_KHUDJAND = 1;
    const GRAM_DUSHANBE = 6;
    protected $connection = 'pgsql';
    public $table = 'public.divisions';

    protected $fillable = [
        'name',
        'city_id',
        'organization_id',
        'is_active',
        'created_by'
    ];
    public function __construct(array $attributes = [])
    {
        $this->table = DB::connection('pgsql')->getDatabaseName().'.'.$this->table;
        parent::__construct($attributes);
    }

   
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function performers()
    {
        return $this->hasMany(Performer::class);
    }
}
