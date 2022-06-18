@extends('layouts.index')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <form class="row profile" action="{{ route('manager-course.lesson.store', $managerCourseId) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center col-md-12">
            <div class="col-md-12" style="height: 100%; background: #fff;">
                <h1>Create lesson</h1>
                <div class="form-group">
                    <label for="nameLesson">Name lesson:</label>
                    <input type="text" class="form-control" id="nameLesson" aria-describedby="emailHelp" name="nameLesson" value="{{ old('nameLesson') }}"
                        placeholder="Name lesson">
                </div>
                <div class="form-group">
                    <label for="descriptionLesson">Desciption</label>
                    <input type="text" class="form-control" id="descriptionLesson" placeholder="description" name="descriptionLesson" value="{{ old('descriptionLesson') }}">
                </div>
                <div class="form-group">
                    <label for="requirementsLesson">Requirements</label>
                    <input type="text" class="form-control" id="requirementsLesson" placeholder="requirements" name="requirements" value="{{ old('requirementsLesson') }}">
                </div>
                <div class="form-group">
                    <label for="timeLesson">Time read</label>
                    <input type="number" class="form-control" id="timeLesson" min="5" max="12" placeholder="timeLesson" name="timeLesson" >
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
</div>
@endsection
