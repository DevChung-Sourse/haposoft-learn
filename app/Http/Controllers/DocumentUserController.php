<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;

class DocumentUserController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->documents()->attach($request['document_id']);
        return redirect()->back()->with('message_doument_user', 'Accomplished!');
    }
}
