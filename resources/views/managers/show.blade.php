@extends('layouts.index')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <form class="row profile" action="{{ route('manager-course.update', $course->id) }}" method="POST"
        enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row justify-content-center col-md-12">
            <div class="col-md-12" style="height: 100%; background: #fff;">
                <h1>Update course</h1>
                <div class="form-group">
                    <label for="nameCourse">Name course:</label>
                    <input type="text" class="form-control" id="nameCourse" aria-describedby="emailHelp" name="nameCourse" value="{{ $course->title }}"
                        placeholder="Name course">
                </div>
                <div class="form-group">
                    <label for="descriptionCourse">Desciption</label>
                    <input type="text" class="form-control" id="descriptionCourse" placeholder="description" name="description" value="{{ $course->description }}">
                </div>
                <div class="form-group">
                    <label for="priceCourse">Price</label>
                    <input type="text" class="form-control" id="priceCourse" placeholder="price" name="price" value="{{ $course->price }}">
                </div>
                <div class="form-group">
                    <label for="imageCourse">Image</label>
                    <input type="file" class="form-control" id="imageCourse" placeholder="image" name="imageCourse">
                </div>
                <button type="submit" class="btn-manager btn-primary">update</button>
                <a href="{{ route('manager-course.index') }}" class="btn-manager btn-cancel bg-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
