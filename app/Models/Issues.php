<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'training_id',
        'user_id',
        'description',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
