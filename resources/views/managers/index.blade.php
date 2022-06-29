@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-12" style="height: 100%; background: #fff;">
            <h1>Manager Courses</h1>
            <a href="{{ route('manager-course.create') }}" class="btn-manager btn-cancel my-3">Create courses</a>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $key => $course)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td class="flex-col">
                            <a href="{{ route('manager-course.lesson.index', $course->id) }}" class="btn-custom-manager btn-cancel">Lesson</a>
                            <a href="{{ route('manager-course.edit', $course->id) }}" class="btn-custom-manager btn-cancel">Edit</a>
                            <form action="{{ route('manager-course.destroy', $course->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn-manager bg-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
