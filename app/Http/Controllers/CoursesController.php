<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        $teachers = User::teacher()->get();
        $tags = Tag::all();
        $courses = Course::search($request->all())->paginate(config('filter.item_page'));
        return view('courses.index', compact(['courses', 'teachers', 'tags', 'request']));
    }

    public function show(Request $request, $id)
    {
        $course = Course::find($id);
        $lessons = $course->lessons()->search($request->all(), $id)->paginate(config('filter.item_page_lessons'));
        $otherCourses = Course::randomCourses($id)->get();
        $teachers = $course->teachers()->get();
        return view('courses.show', compact(['course', 'lessons', 'otherCourses', 'teachers', 'request']));
    }
}
