<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class ListCoursesController extends Controller
{
    public function index(Request $request)
    {
        $teachers = User::teacher()->get();
        $tags = Tag::all();
        $courses = Course::search($request->all())->paginate(config('filter.item_page'));
        return view('listcourses', compact(['courses', 'teachers', 'tags', 'request']));
    }
}
