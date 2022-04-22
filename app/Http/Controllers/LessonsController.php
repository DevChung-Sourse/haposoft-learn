<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use App\Models\Lesson;

class LessonsController extends Controller
{
    public function show($courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $otherCourses = Course::randomCourses();
        $documents = $lesson->documents()->get();
        return view('lessons.show', compact(['course', 'lesson', 'otherCourses', 'documents']));
    }
}
