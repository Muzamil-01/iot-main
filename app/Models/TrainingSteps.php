<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSteps extends Model
{
    use HasFactory;
    protected $fillable = [
        'step_num',
        'step_name',
        'media',
        'description',
        'training_id',
    ];
    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id', 'id');
    }
}
