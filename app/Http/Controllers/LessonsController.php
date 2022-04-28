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
        if ($lesson->lessonIsStarted()) {
            $result = 0;
            $lesson->users()->attach(Auth::id(), ['progress' => 0]);
        } else {
            $countAllDocument = $documents->count();
            $countDocumentAccomplished = Auth::user()->getCountUserDocuments($lessonId);
            $result = $countDocumentAccomplished / $countAllDocument * 100;
            $lesson->users()->detach(Auth::id());
            $lesson->users()->attach(Auth::id(), ['progress' => $result]);
        }
        return view('lessons.show', compact(['course', 'lesson', 'otherCourses', 'result', 'documents']));
    }
}
