@extends('layouts.index')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <form class="row profile" action="{{ route('manager-course.lesson.update', [$id, $lesson->id]) }}" method="POST"
        enctype="multipart/form-data">
        @method("PATCH")
        @csrf
        <div class="row justify-content-center col-md-12">
            <div class="col-md-12" style="height: 100%; background: #fff;">
                <h1>Update lesson</h1>
                <div class="form-group">
                    <label for="nameLesson">Name lesson:</label>
                    <input type="text" class="form-control" id="nameLesson" aria-describedby="emailHelp" name="nameLesson" value="{{ $lesson->title }}"
                        placeholder="Name lesson">
                </div>
                <div class="form-group">
                    <label for="descriptionLesson">Desciption</label>
                    <input type="text" class="form-control" id="descriptionLesson" placeholder="description" name="descriptionLesson" value="{{ $lesson->description }}">
                </div>
                <div class="form-group">
                    <label for="requirementsLesson">Requirements</label>
                    <input type="text" class="form-control" id="requirementsLesson" placeholder="requirements" name="requirements" value="{{ $lesson->requirements }}">
                </div>
                <div class="form-group">
                    <label for="timeLesson">Time read</label>
                    <input type="number" class="form-control" id="timeLesson" min="5" max="12" placeholder="timeLesson" name="timeLesson" value="{{ $lesson->time }}" >
                </div>
                <button type="submit" class="btn-manager btn-cancel my-3">Update</button>
                <a href="{{ route('manager-course.lesson.index', $id) }}" class="btn-manager btn-cancel bg-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
