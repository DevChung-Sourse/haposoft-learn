<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cloudinary;
use App\Models\Course;

class ManagerCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $courses = $user->teacherCourses()->get();
        return view('managers.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();
        if ($request->file('imageCourse')) {
            $urlImageAvatar = $request->file('imageCourse')->store('images', 'public');
        }
        $course['title'] = $request->nameCourse;
        $course['thumbnail'] = $urlImageAvatar;
        $course['description'] = $request['description'];
        $course['price'] = $request->price;

        $course->save();
        $course->teachers()->attach(Auth::id());
        return redirect()->back()->with('success', 'Create course successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('managers.show', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course['title'] = $request->nameCourse;
        if ($request->file('imageCourse')) {
            $urlImageAvatar = $request->file('imageCourse')->store('images', 'public');
        }
        $course['description'] = $request['description'];
        $course['price'] = $request->price;
        $course->update();
        return redirect()->route('manager-course.index')->with('success', 'Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        $course->teachers()->detach(Auth::id());
        return redirect()->route('manager-course.index')->with('success', 'Delete successfully!');
    }
}
