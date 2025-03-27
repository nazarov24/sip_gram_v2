<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerCarOption extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $fillable = [
        'model_id',
        'model'
    ];

    public function option() 
    {
        $result = null;
        switch ($this->model) {
            case CarOption::class:
                $result = CarOption::findOrFail($this->model_id);
                break;
            case BodyType::class:
                $result = BodyType::findOrFail($this->model_id);
                break;
            case PerformerOption::class:
                $result = PerformerOption::findOrFail($this->model_id);
                break;
        }
        return $result;
    }
}
