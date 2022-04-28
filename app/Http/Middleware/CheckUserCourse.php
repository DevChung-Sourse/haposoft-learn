<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class CheckUserCourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        foreach (Auth::user()->teacher()->get() as $item) {
            if (Auth::id() === $item->id) {
                return redirect()->back()->with('message_teacher', 'Teacher do not register this course');
            }
        }
        return $next($request);
    }
}
