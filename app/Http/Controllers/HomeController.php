<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Review;
use App\Models\Lesson;
use App\Models\UserLesson;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all()->random(3);
        $reviews = Review::all()->random(4);
        $countCourses = Course::all()->count();
        $countLessons = Lesson::all()->count();
        $countLearners = UserLesson::all()->count();
        return view('home', compact([
            'courses',
            'reviews',
            'countCourses',
            'countLessons',
            'countLearners'
        ]));
    }
}
