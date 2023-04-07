<?php

namespace App\Http\Middleware;

use App\Models\Department;
use Closure;
use Illuminate\Http\Request;
use App\Http\Helpers\UserTraining;

class UserIssues
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {

            $user = auth()->user();
            if ($user->department_id != null && Department::where('id', '=', $user->department_id)->exists()) {
                $department = Department::find($user->department_id);

                $user_training =  new UserTraining();
                $user_training->check_if_attended_all_tranings($department);
            }
        }
        return $next($request);
    }
}
