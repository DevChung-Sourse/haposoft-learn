<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use App\Models\Document;

class DocumentUserController extends Controller
{
    public function store(Request $request)
    {
        $document = Document::find($request['document_id']);
        if ($document->lesson_id == $request['lesson_id'] && $document->course_id == $request['course_id']) {
            Auth::user()->documents()->attach($request['document_id']);
        }
        return redirect()->back()->with('message_doument_user', 'Accomplished!');
    }
}
