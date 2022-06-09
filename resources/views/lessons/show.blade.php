@extends('layouts.index')

@section('content')
<div class="container-detail">
    <nav aria-label="breadcrumb" class="nav-breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">All courses</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.show', [$course->id]) }}">Course detail</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course detail</li>
        </ol>
    </nav>
    <div class="detail row">
        <div class="detail-left col-md-8">
            <div class="detail-left-body">
                <div class="detail-left-img"><img src="{{ $course->thumbnail }}" alt="Anh course"></div>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $resultProgress }}%;"
                        aria-valuenow="{{ $resultProgress }}" aria-valuemin="{{ $resultProgress }}" aria-valuemax="100">{{
                        $resultProgress }} %</div>
                </div>
                <div id="accordion" class="accordion">
                    <div class="d-flex accourdion-detail">
                        <div class="accordion-btn active-switch" id="headingOne">
                            <button class="btn-link btn-switch" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Descriptions
                            </button>
                        </div>
                        <div class="accordion-btn" id="headingTwo">
                            <button class="btn-link collapsed btn-switch" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Programs
                            </button>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="lesson-description">
                                <p class="description-title">Descriptions lesson</p>
                                <p class="description-text">{{ $lesson->description }}</p>
                            </div>
                            <div class="lesson-requirement">
                                <p class="description-title">Requirements</p>
                                <p class="description-text">{{ $lesson->requirements }}</p>
                            </div>
                            <div>
                                <p class="tags">Tags: </p>
                                @foreach ($course->tags()->get() as $tag)
                                <a class="lesson-tags" href="{{ $tag->link }}">
                                    #{{ $tag->title }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            @foreach ($documents as $document)
                            <div class="lessons-item row">
                                <p class="col-md-9 lesson-item-title row">
                                    <img src="{{ $document->file_path }}" alt="image document"
                                        class="document-img col-md-2">
                                    <span class="document-type col-md-2">{{ $document->type }}</span>
                                    <span class="document-title col-md-8">{{ $document->title }}</span>
                                </p>
                                <div class="col-md-3 btn-learn">
                                    <form action="{{ route('document-user.store') }}" class="col" method="POST">
                                        @csrf
                                        <input type="hidden" name="document_id" value="{{ $document->id }}">
                                        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <button type="submit" {{ Auth::user()->formatButtonDisable($document->id) }}
                                            class="button-custom-circle button border-0 {{
                                            Auth::user()->addClassDisabled($document->id) }}">{{
                                            Auth::user()->changeTextButton($document->id) }}</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-detail mt-0">
                <table class="table-infor">
                    <tr>
                        <td class="table-title"><i class="icon-course-info fa-solid fa-desktop"></i>Course: </td>
                        <td class="info-number">{{ $course->title }}</td>
                    </tr>
                    <tr>
                        <td class="table-title"><i class="icon-course-info fa-solid fa-users"></i>Learners: </td>
                        <td class="info-number">{{ $course->learners }}</td>
                    </tr>
                    <tr>
                        <td class="table-title"><i class="icon-course-info fa-solid fa-clock"></i>Times</td>
                        <td class="info-number">{{ $course->time_sum_hours }}</td>
                    </tr>
                    <tr>
                        <td class="table-title"><i class="icon-course-info fa-solid fa-key"></i>Tags</td>
                        <td class="info-number">
                            @foreach ($course->tags()->get() as $tag)
                            <a href="{{ $tag->link }}" class="course-tags">#{{ $tag->title }}</a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="table-title"><i class="icon-course-info fa-solid fa-money-check-dollar"></i>Price
                        </td>
                        <td class="info-number">{{ $course->processed_price }}</td>
                    </tr>
                    <tr>
                        <td class="table-title text-center" colspan="2">
                            <form action="{{ route('user-course.update', $course->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="1">
                                <button type="submit"
                                    class="button-custom-circle register-course {{ $course->danger_button }}" {{
                                    $course->disable_button }}>
                                    {{ $course->text_button }}
                                </button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="detail-other-course">
                <p class="other-course-title">Other Courses</p>
                <ul class="detail-list-course">
                    @foreach ($otherCourses as $key => $otherCourse)
                    <li class="other-course-item"><a href="">{{ $key + 1 }} . {{ $otherCourse->title }}</a></li>
                    @endforeach
                </ul>
                <div class="detail-button"><a href="" class="button-custom-circle view-all-course">View all ours
                        course</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
