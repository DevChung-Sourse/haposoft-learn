<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class ListCoursesController extends Controller
{
    public function show()
    {
        $courses = Course::whereHas('tags', function($subQuery) {
            $subQuery->where('tags_id', 1);
        })->get();
        dd($courses);
    }
}
