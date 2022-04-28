@extends('layouts.index')

@section('content')
<div class="container-detail">
    <nav aria-label="breadcrumb" class="nav-breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">All courses</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course detail</li>
        </ol>
    </nav>
    @if ($message = Session::get('message_teacher'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="detail row">
        <div class="detail-left col-md-8">
            <div class="detail-left-body">
                <div class="detail-left-img"><img src="{{ $course->thumbnail }}" alt="Anh course"></div>
                <div id="accordion" class="accordion">
                    <div class="d-flex accourdion-detail">
                        <div class="accordion-btn active-switch" id="headingOne">
                            <button class="btn-link btn-switch" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Lessons
                            </button>
                        </div>
                        <div class="accordion-btn" id="headingTwo">
                            <button class="btn-link collapsed btn-switch" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Teachers
                            </button>
                        </div>
                        <div class="accordion-btn" id="headingThree">
                            <button class="btn-link collapsed btn-switch" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Reviews
                            </button>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body pb-5">
                            <div class="row form-lessons mx-0">
                                @if ($message = Session::get('message_join'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                <form action="" method="GET" class="col-md-9">
                                    <input type="text" id="keywords_lesson" class="form-input-lesson"
                                        name="keywords_lesson" placeholder="Search..." value="">
                                    <label for="keywords_lesson"><i
                                            class="fa-solid fa-magnifying-glass search-icon"></i></label>
                                    <button type="submit" class="search-button">Tìm kiếm</button>
                                </form>
                                <form class="col-md-3" action="@if(Auth::user() == null || Auth::user()->getUserCourse($course->id) === 0)
                                        {{ route('user-course.store') }}
                                        @else{{ route('user-course.update', $course->id) }}@endif" method="POST">
                                    @csrf
                                    @if (Auth::user() != null)
                                    <input type="hidden" name="_method" @if (Auth::user()->getUserCourse($course->id) >
                                    0) value="PATCH" @endif>
                                    @endif
                                    <input type="hidden" name="hidden" value="0">
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <button type="submit"
                                        class="button-custom-circle register-course {{ $course->danger_button }}" {{
                                        $course->disable_button }}>
                                        {{ $course->text_button }}
                                    </button>
                                </form>
                            </div>
                            @include('lessons.lesson')
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <p class="main-teacher">Main teachers</p>
                            @foreach ($teachers as $teacher)
                            <div class="card-info-teacher">
                                <div class="card-info">
                                    <img src="{{ $teacher->avatar }}" alt="img-avatar-teacher" class="img-teacher">
                                    <div class="card-info-main">
                                        <p class="card-info-name">{{ $teacher->name }}</p>
                                        <p class="card-info-time">Second Years Teacher</p>
                                        <div class="card-info-icon">
                                            <i class="info-icon info-icon-gg fa-brands fa-google-plus-g"></i>
                                            <i class="info-icon info-icon-fb fa-brands fa-facebook-f"></i>
                                            <i class="info-icon info-icon-slack fa-brands fa-slack"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-info-desc">{{ $teacher->job }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            hello I love You!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="desc-course">
                <p class="desc-course-title">Descriptions course</p>
                <p class="desc-course-text">{{ $course->description }}</p>
            </div>
            <div class="info-detail">
                <table class="table-infor">
                    <tr>
                        <td class="table-title"><i class="icon-course-info fa-solid fa-users"></i>Learners: </td>
                        <td class="info-number">{{ $course->learners }}</td>
                    </tr>
                    <tr>
                        <td class="table-title"><i class="icon-course-info fa-solid fa-book-open"></i>Lessons: </td>
                        <td class="info-number">{{ $course->lessons_count }} lesson</td>
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
