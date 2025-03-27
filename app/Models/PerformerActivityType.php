<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerActivityType extends Model
{
    use HasFactory;
    const NEW_DRIVER = 'newDriver';
    const COMPLATE_ORDER = 'complateOrder';
    const ROLLBACK_ORDER = 'rollbackOrder';
    const CANCEL_ORDER = 'cancelOrder';
    const PHOTO_CONTROL_ACCEPTED = 'photocontrolAccepted';
    const CLIENT_GRADE = 'clientGrade';
    const CLIENT_NEGATIVE = 'clientNegative';
    const FILING_DRIVER = 'filingDriver';
    protected $connection = 'pgsql';
    protected $fillable = [
        'name',
        'code',
        'is_active',
        'number',
        'params',
        'num_type'
    ];

    public function setParamsAttribute($value)
    {
        $this->attributes["params"] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function getParamsAttribute()
    {
        if(is_null($this->attributes["params"])) {
            return null;
        }
        return json_decode($this->attributes["params"], JSON_UNESCAPED_UNICODE);
    }
}
