<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Document;

class CreateLessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($managerCourseId)
    {
        $lessons = Lesson::where('course_id', $managerCourseId)->get();
        $course = Course::find($managerCourseId);
        $nameCourse = $course->title;
        return view('lessons.index', compact(['managerCourseId', 'lessons', 'nameCourse']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($managerCourseId)
    {
        return view('lessons.create', compact('managerCourseId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $lesson = new Lesson();
        $lesson['title'] = $request->nameLesson;
        $lesson['description'] = $request->descriptionLesson;
        $lesson['requirements'] = $request->requirements;
        $lesson['time'] = $request->timeLesson;
        $lesson['course_id'] = $id;
        $lesson->save();
        return redirect()->back()->with('success', 'Create lesson successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($courseId, $lessonId)
    {
        $documents = Document::where('lesson_id', $lessonId)->get();
        return view('Document.index', compact(['documents', 'courseId', 'lessonId']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $lessonId)
    {
        $lesson = Lesson::where('course_id', $id)->where('id', $lessonId)->first();
        // dd($lesson);
        return view('lessons.edit', compact(['lesson', 'id']));
    }

    public function update(Request $request, $id, $lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $lesson['title'] = $request->nameLesson;
        $lesson['description'] = $request->descriptionLesson;
        $lesson['requirements'] = $request->requirements;
        $lesson['time'] = $request->timeLesson;
        $lesson->update();
        return redirect()->route('manager-course.lesson.index', $id)->with('success', 'Update lesson successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $lesson->delete();
        return redirect()->back()->with('success', 'Delete successfully!');

    }
}
