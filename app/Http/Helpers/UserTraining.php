<?php

namespace App\Http\Helpers;

use App\Models\Department;
use App\Models\Training;
use App\Models\UserTrainings;
use App\Models\Issues;
use Illuminate\Support\Facades\Auth;

class UserTraining
{
    public function initialize(Training $training)
    {
        $user = auth()->user();
        $user_training =  UserTrainings::where('user_id', '=', $user->id)
            ->where('training_id', '=', $training->id)
            // ->where('status', '=', 1)
            ->first();
        if (!$user_training) {
            $user_training = UserTrainings::create([
                'user_id' => $user->id,
                'training_id' => $training->id
            ]);
        }

        return $user_training;
    }
    public function check_if_attended_all_tranings(Department $department)
    {
        $trainings = Training::where('department_id', '=', $department->id)->get();
        $user = auth()->user();

        foreach ($trainings as $training) {

            if (!UserTrainings::where('user_id', '=', $user->id)
                ->where('training_id', '=', $training->id)
                // ->where('status', '=', 1)
                ->exists()) {

                $message = 'User ' . $user->name . ' belongs to ' . $department->dep_name . ' has not attended the training: <a href="' . route('trainings.show', $training->id) . '" >' . $training->name . '</a>';

                if (!Issues::where('user_id', '=', $user->id)
                    ->where('training_id', '=', $training->id)
                    // ->where('status', '=', 1)
                    ->exists()) {

                    Issues::create([
                        'name' => 'Did not attended the training',
                        'user_id' => $user->id,
                        'department_id' => $department->id,
                        'training_id' => $training->id,
                        'description' => $message
                    ]);
                }
            }
        }
    }
}
