<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $otherCourses = Course::randomCourses($courseId)->get();
        $documents = $lesson->documents()->get();
        if (Auth::user()->getUserCourse($courseId)) {
            if ($lesson->lessonIsStarted()) {
                $lesson->users()->attach(Auth::id(), ['progress' => 0]);
            } else {
                $lesson->users()->sync(Auth::id());
            }
        }
        $resultProgress = Auth::user()->progressOfLesson($lessonId);
        return view('lessons.show', compact(['course', 'lesson', 'otherCourses', 'resultProgress', 'documents']));
    }
}
