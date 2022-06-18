<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cloudinary;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $myCourses = Auth::user()->userCourses()->get();
        return view('profile.profile', compact('myCourses'));
    }

    public function update(Request $request, $id)
    {
        if ($request->file('file')) {
            dd($request->file('file'));
            $urlImageAvatar = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
        } else {
            $urlImageAvatar = Auth::user()->avatar;
        }
        if ($request['about']) {
            $about = $request['about'];
        } else {
            $about = Auth::user()->about_me;
        }
        $data = [
            'full_name' => $request['full_name'],
            'phone' => $request['phone'],
            'birthday' => $request['birthday'],
            'address' => $request['address'],
            'about_me' => $about,
            'avatar' => $urlImageAvatar,
        ];
        Auth::user()->update($data);
        return redirect()->back()->with('message-profile', 'Update profile successfully');
    }
}
