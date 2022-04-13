@extends('layouts.app')
@section('content')
<div class="hapo-listcourse-body">
    <div class="container">
        <div class="hapo-listcourse-header">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-course-filter">
                                <div class="list-course-filter-content"><i
                                        class="fa-solid fa-arrow-down-short-wide"></i>Filter</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="list-course-search">
                                <input type="text" name="search" placeholder="Search..." class="input-search">
                                <i class="fa-solid fa-magnifying-glass search"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="list-course-btn-search">Tìm kiếm</button>
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
                <div class="col-md-1">
                    <div class="list-course-filter-new">
                        <a href="#" class="filter-new">Mới nhất</a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="list-course-filter-old">
                        <a href="#" class="filter-old">Cũ nhất</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Teacher</option>
                        <option value="1">Teacher-1</option>
                        <option value="2">Teacher-2</option>
                        <option value="3">Teacher-3</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Số người học</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Thời gian học</option>
                        <option value="1">Ngày-1</option>
                        <option value="2">Ngày-2</option>
                        <option value="3">Ngày-3</option>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Số bài học</option>
                        <option value="1">Tăng dần</option>
                        <option value="2">Giảm dần</option>
                </div>
            </div>
            <div class="row hapo-listcourse-select-main-second">
                <div class="col-1"></div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Tags</option>
                        <option value="1">Tags-1</option>
                        <option value="2">Tags-2</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Review</option>
                        <option value="1">Review-1</option>
                        <option value="2">Review-2</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="hapo-list-course-main">
            <div class="container">
                <div class="row list-card">
                    <div class="col-md-5 col-12 list-course-card">
                        <div class="hapo-list-course-head">
                            <div class="list-course-logo">
                                <img src="./public/img/list-html.png" alt="list-course-html">
                            </div>
                            <div class="list-course-content">
                                <div class="list-course-content-title">HTML Fundamentals</div>
                                <p class="list-course-content-txt">Practice during lessons, practice between
                                    lessons,
                                    practice whenever you can. Master the task, then reinforce and test your
                                    knowledge
                                    with fun, hands-on exercises and interactive quizzes.</p>
                            </div>
                        </div>
                        <div class="list-course-btn">
                            <button class="list-course-btn-more">More</button>
                        </div>
                        <div class="hapo-list-course-statistic">
                            <div class="hapo-list-course-statistic-left">
                                <div class="list-course-specical-title">Learners</div>
                                <div class="list-course-specical-num">16,882</div>
                            </div>
                            <div class="hapo-list-course-statistic-mid">
                                <div class="list-course-specical-title">Lessons</div>
                                <div class="list-course-specical-num">2,689</div>
                            </div>
                            <div class="hapo-list-course-statistic-right">
                                <div class="list-course-specical-title">Times</div>
                                <div class="list-course-specical-num">100 (h)</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12 list-course-card">
                        <div class="hapo-list-course-head">
                            <div class="list-course-logo">
                                <img src="./public/img/list-css.png" alt="list-course-css">
                            </div>
                            <div class="list-course-content">
                                <div class="list-course-content-title">CSS Fundamentals</div>
                                <p class="list-course-content-txt">Practice during lessons, practice between
                                    lessons,
                                    practice whenever you can. Master the task, then reinforce and test your
                                    knowledge
                                    with fun, hands-on exercises and interactive quizzes.</p>
                            </div>
                        </div>
                        <div class="list-course-btn">
                            <button class="list-course-btn-more">More</button>
                        </div>
                        <div class="hapo-list-course-statistic">
                            <div class="hapo-list-course-statistic-left">
                                <div class="list-course-specical-title">Learners</div>
                                <div class="list-course-specical-num">16,882</div>
                            </div>
                            <div class="hapo-list-course-statistic-mid">
                                <div class="list-course-specical-title">Lessons</div>
                                <div class="list-course-specical-num">2,689</div>
                            </div>
                            <div class="hapo-list-course-statistic-right">
                                <div class="list-course-specical-title">Times</div>
                                <div class="list-course-specical-num">100 (h)</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12 list-course-card">
                        <div class="hapo-list-course-head">
                            <div class="list-course-logo">
                                <img src="./public/img/list-php.png" alt="list-course-php">
                            </div>
                            <div class="list-course-content">
                                <div class="list-course-content-title">Swift 4 Fundamentals</div>
                                <p class="list-course-content-txt">Practice during lessons, practice between
                                    lessons,
                                    practice whenever you can. Master the task, then reinforce and test your
                                    knowledge
                                    with fun, hands-on exercises and interactive quizzes.</p>
                            </div>
                        </div>
                        <div class="list-course-btn">
                            <button class="list-course-btn-more">More</button>
                        </div>
                        <div class="hapo-list-course-statistic">
                            <div class="hapo-list-course-statistic-left">
                                <div class="list-course-specical-title">Learners</div>
                                <div class="list-course-specical-num">16,882</div>
                            </div>
                            <div class="hapo-list-course-statistic-mid">
                                <div class="list-course-specical-title">Lessons</div>
                                <div class="list-course-specical-num">2,689</div>
                            </div>
                            <div class="hapo-list-course-statistic-right">
                                <div class="list-course-specical-title">Times</div>
                                <div class="list-course-specical-num">100 (h)</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12 list-course-card">
                        <div class="hapo-list-course-head">
                            <div class="list-course-logo">
                                <img src="./public/img/list-sql.png" alt="list-course-sql">
                            </div>
                            <div class="list-course-content">
                                <div class="list-course-content-title">SQL Fundamentals</div>
                                <p class="list-course-content-txt">Practice during lessons, practice between
                                    lessons,
                                    practice whenever you can. Master the task, then reinforce and test your
                                    knowledge
                                    with fun, hands-on exercises and interactive quizzes.</p>
                            </div>
                        </div>
                        <div class="list-course-btn">
                            <button class="list-course-btn-more">More</button>
                        </div>
                        <div class="hapo-list-course-statistic">
                            <div class="hapo-list-course-statistic-left">
                                <div class="list-course-specical-title">Learners</div>
                                <div class="list-course-specical-num">16,882</div>
                            </div>
                            <div class="hapo-list-course-statistic-mid">
                                <div class="list-course-specical-title">Lessons</div>
                                <div class="list-course-specical-num">2,689</div>
                            </div>
                            <div class="hapo-list-course-statistic-right">
                                <div class="list-course-specical-title">Times</div>
                                <div class="list-course-specical-num">100 (h)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
