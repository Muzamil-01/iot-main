<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'estimated_time',
        'description',
        'department_id',
    ];
    public function steps()
    {
        return $this->hasMany(TrainingSteps::class);
    }
}
