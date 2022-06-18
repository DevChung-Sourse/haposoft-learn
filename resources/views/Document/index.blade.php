@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-12" style="height: 100%; background: #fff;">
            <h1>Manager documents:</h1>
            <a href="{{ route('manager-course.lesson.document.create', [$courseId, $lessonId]) }}" class="btn">Create document</a>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Type</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $key => $document)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $document->title }}</td>
                        <td>{{ $document->type }}</td>
                        <td>
                            <a href="{{ route('manager-course.lesson.document.edit', [$document->id, $courseId, $lessonId]) }}" class="btn">Edit</a>
                            <form action="{{ route('manager-course.lesson.document.destroy', [$document->id, $courseId, $lessonId]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete</button>
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
