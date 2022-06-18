<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($courseId, $lessonId)
    {
        // dd($courseId, $lessonId);
        return view('Document.create', compact(['courseId', 'lessonId']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $courseId, $lessonId)
    {
        $document = new Document();
        $path = $request->file('fileDocument')->store('public/files');
        $type = explode('.', $path);
        $document['title'] = $request->nameDocument;
        $document['type'] = $type[1];
        $document['file_path'] = $path;
        $document['lesson_id'] = $lessonId;
        $document->save();
        return redirect()->back()->with('success', 'Create document successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $courseId, $lessonId)
    {
        $document = Document::find($id);
        return view('Document.edit', compact(['document', 'courseId', 'lessonId']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $courseId, $lessonId)
    {
        $document = Document::find($id);
        if ($request->file('fileDocument')) {
        $path = $request->file('fileDocument')->store('public/files');
        } else {
            $path = $document['file_path'];
        }
        $type = explode('.', $path);
        $document['title'] = $request->nameDocument;
        $document['type'] = $type[1];
        $document['file_path'] = $path;
        $document->update();
        return redirect()->route('manager-course.lesson.show', [$courseId, $lessonId])->with('success', 'Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $courseId, $lessonId)
    {
        $document = Document::find($id);
        $document->delete();
        return redirect()->back()->with('success', 'Delete document successfully!');
    }
}
