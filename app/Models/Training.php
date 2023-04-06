<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrainingSteps;
use App\Models\Department;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'estimated_time',
        'description',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function steps()
    {
        return $this->hasMany(TrainingSteps::class);
    }
}
