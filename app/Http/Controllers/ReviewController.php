<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'comments' => $request['message'],
            'vote' => $request['votes'],
            'user_id' => Auth::id(),
            'course_id' => $request['course_id'],
        ];
        Review::create($data);
        return redirect()->back();
    }
}
