<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Training;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'dep_name',
        'description',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'department_id');
    }

    public function trainings()
    {
        return $this->hasMany(Training::class, 'department_id');
    }
}
