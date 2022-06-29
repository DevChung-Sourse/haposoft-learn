@extends('layouts.index')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <form class="row profile" action="{{ route('manager-course.lesson.document.update', [$document->id, $courseId, $lessonId]) }}" method="POST"
        enctype="multipart/form-data">
        @method("PATCH")
        @csrf
        <div class="row justify-content-center col-md-12">
            <div class="col-md-12" style="height: 100%; background: #fff;">
                {{-- @dd($document) --}}
                <h1>Edit document</h1>
                <div class="form-group">
                    <label for="nameDocument">Title document:</label>
                    <input type="text" class="form-control" id="nameDocument" aria-describedby="emailHelp" name="nameDocument" value="{{ $document->title }}"
                        placeholder="Name lesson">
                </div>
                <div class="form-group">
                    <label for="fileDocument">File:</label>
                    <input type="file" class="form-control" id="fileDocument" placeholder="requirements" name="fileDocument" value="{{ $document->file_path }}">
                </div>
                <button type="submit" class="btn-manager btn-cancel my-3">Edit</button>
                <a href="{{ route('manager-course.lesson.show', [$courseId, $lessonId]) }}" class="btn-manager btn-cancel bg-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
