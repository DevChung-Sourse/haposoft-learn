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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id, Request $request)
    {
        $course = Course::find($id);
        $lessons = Lesson::lessonsOfCourse($request->all(), $id)->paginate(config('filter.item_page_lessons'));
        $otherCourses = Course::get()->random(5);
        $teachers = $course->teachers()->get();
        return view('courses.show', compact(['course', 'lessons', 'otherCourses', 'teachers', 'request']));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
