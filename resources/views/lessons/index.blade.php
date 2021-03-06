@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-12" style="height: 100%; background: #fff;">
            <h1>Manager lessons:</h1>
            <a href="{{ route('manager-course.lesson.create', $managerCourseId) }}" class="btn-manager btn-cancel my-3">Create lesson</a>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Lesson</th>
                        <th scope="col">Description</th>
                        <th scope="col">Requirements</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lessons as $key => $lesson)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->description }}</td>
                        <td>{{ $lesson->requirements }}</td>
                        <td class="flex-col">
                            <a href="{{ route('manager-course.lesson.show', [$managerCourseId, $lesson->id]) }}" class="btn-custom-manager btn-cancel">Documents</a>
                            <a href="{{ route('manager-course.lesson.edit', [$managerCourseId, $lesson->id]) }}" class="btn-custom-manager btn-cancel">Edit</a>
                            <form action="{{ route('manager-course.lesson.destroy', [$managerCourseId, $lesson->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn-manager bg-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('manager-course.index') }}" class="btn-manager btn-cancel my-3 bg-secondary">Courses</a>
        </div>
    </div>
</div>
@endsection
