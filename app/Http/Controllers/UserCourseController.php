<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCourse;
use App\Models\User;

class UserCourseController extends Controller
{
    public function __constructor()
    {
        $this->middleware('isStudent');
    }

    public function store(Request $request)
    {
        $data = [
            'course_id' => $request['course_id'],
            'user_id' => Auth::user()->id,
            'status' => $request['hidden'],
        ];
        UserCourse::create($data);
        return redirect()->back()->with('message_join', 'Join successfully!');
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $user->userCourses()->detach($id);
        $user->userCourses()->attach($id, ['status' => 1]);
        return redirect()->back()->with('message_update', 'Update successfully!');
    }
}
