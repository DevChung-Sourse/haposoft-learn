@extends('layouts.app')
@section('content')
<div class="hapo-listcourse-body">
    <div class="container-courses">
        <form action="{{ route('list-courses.index') }}" method="GET" class="form-search">
            @csrf
            <div class="hapo-listcourse-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row filter-search">
                            <div class="col-md-3">
                                <div class="list-course-filter">
                                    <div class="list-course-filter-content">
                                        <i class="fa-solid fa-arrow-down-short-wide"></i>Filter
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="list-course-search">
                                    <input type="text" name="search" placeholder="Search..." class="input-search">
                                    <i class="fa-solid fa-magnifying-glass search"></i>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="list-course-btn-search">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hapo-listcourse-selective">
                <div class="row hapo-listcourse-select-main">
                    <div class="col-md-1">
                        <div class="filter-by">Lọc theo</div>
                    </div>
                    <ul class="filter-date col-md-2">
                        <li class="col-md-6">
                            <input type="radio" id="latest" name="created_time" value="{{ config('filter.sort.desc') }}"
                                @if ($request->created_time == config('filter.sort.desc') ||
                            is_null($request->created_time)) checked @endif/>
                            <label for="latest">Mới nhất</label>
                        </li>
                        <li class="col-md-6">
                            <input type="radio" id="oldest" name="created_time" value="{{ config('filter.sort.asc') }}"
                                @if ($request->created_time == config('filter.sort.asc')) checked @endif/>
                            <label for="oldest">Cũ nhất</label>
                        </li>
                    </ul>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example" name="teacher">
                            <option value="" selected>Teacher</option>
                            @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if($request['teacher']==$teacher->id) selected @endif>
                                {{ $teacher->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example" name="learner">
                            <option value="{{ $request->learner }}" selected>Số người học</option>
                            <option value="{{ config('filter.sort.asc') }}" @if($request->learner ==
                                config('filter.sort.asc')) selected @endif>Tăng dần</option>
                            <option value="{{ config('filter.sort.desc') }}" @if($request->learner ==
                                config('filter.sort.desc')) selected @endif>Giảm dần</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example" name="learn_time">
                            <option value="{{ $request->learn_time }}" selected>Thời gian học</option>
                            <option value="{{ config('filter.sort.asc') }}" @if($request->learner_time ==
                                config('filter.sort.asc')) selected @endif>Tăng dần</option>
                            <option value="{{ config('filter.sort.desc') }}" @if($request->learner_time ==
                                config('filter.sort.desc')) selected @endif>Giảm dần</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example" name="lesson">
                            <option value="{{ $request->lesson }}" selected>Số bài học</option>
                            <option value="{{ config('filter.sort.asc') }}" @if($request->lesson ==
                                config('filter.sort.asc')) selected @endif>Tăng dần</option>
                            <option value="{{ config('filter.sort.desc') }}" @if($request->lesson ==
                                config('filter.sort.desc')) selected @endif>Giảm dần</option>
                        </select>
                    </div>
                </div>
                <div class="row hapo-listcourse-select-main-second">
                    <div class="col-1"></div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example" name="tag">
                            <option value="" selected>Tags</option>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @if($request['tag']==$tag->id) selected @endif>
                                {{ $tag->title }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="hapo-list-course-main">
            <div class="list-card">
                @foreach ($courses as $course)
                @include('courses.course')
                @endforeach
            </div>
            {!! $courses->links() !!}
        </div>
    </div>
</div>
@endsection
