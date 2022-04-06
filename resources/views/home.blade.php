@extends('layouts.app')

@section('content')
<!-- Begin banner -->
<div class="banner">
    <div class="banner-bg"></div>
    <div class="banner-content">
        <p class="banner-content-title">Learn Anytime, Anywhere</p>
        <p class="banner-content-subtitle">at HapoLearn <img src="./images/hapo_learn_icon.png" alt="icon con cú!"
                class="banner-icon-owl"> !</p>
        <p class="banner-content-desc">
            Interactive lessons. "on-the-top"<br>practice, per supports
        </p>
        <button class="banner-content-btn btn">Start Learn Now</button>
    </div>

</div>
<!-- End banner -->

<!-- Begin list course -->
<div class="card-list">
    @foreach ($courses as $course)
    <div class="card-item">
        <div class="card-img card-html-bg">
            <img src="{{ $course->thumbnail }}" class="card-box-img" alt="Ảnh html css js">
        </div>
        <div class="card-content">
            <p class="card-content-title">{{ $course->title }}</p>
            <p class="card-content-decs">{{ $course->description }}</p>
            <a href="" class="card-btn btn">Take This Course</a>
        </div>
    </div>
    @endforeach
</div>
<!-- End list course -->

<!-- Begin other courses -->
<div class="other-courses">
    <div class="other-courses-title">Other Courses</div>
    <div class="card-list other-courses-list">
        @foreach ($courses as $course)
        <div class="card-item">
            <div class="card-img card-html-bg">
                <img src="{{ $course->thumbnail }}" class="card-box-img" alt="Ảnh html css js">
            </div>
            <div class="card-content">
                <p class="card-content-title">{{ $course->title }}</p>
                <p class="card-content-decs">{{ $course->description }}</p>
                <a href="" class="card-btn btn">Take This Course</a>
            </div>
        </div>
        @endforeach
    </div>
    <a href="#" class="other-courses-link">View All Our Courses <i class="fa-solid fa-arrow-right-long"></i></a>
</div>
<!-- End other courses -->

<!-- Begin why learn -->
<div class="why-learn">
    <div class="why-learn-a-macbook">
        <img src="./images/hapo_learn_why_learn_macbook.png" alt="ảnh macbook" class="why-learn-a-macbook-img">
    </div>
    <div class="why-title">
        <p class="why-title-text">
            Why HapoLearn?
        </p>
    </div>
    <div class="why-content">
        <p class="why-content-desc">
            <i class="fa-solid fa-circle-check"></i>
            <span class="why-content-desc-text">
                Interactive lessons, "on-the-go" practice, peer support.
            </span>
        </p>
        <p class="why-content-desc">
            <i class="fa-solid fa-circle-check"></i>
            <span class="why-content-desc-text">
                Interactive lessons, "on-the-go" practice, peer support.
            </span>
        </p>
        <p class="why-content-desc">
            <i class="fa-solid fa-circle-check"></i>
            <span class="why-content-desc-text">
                Interactive lessons, "on-the-go" practice, peer support.
            </span>
        </p>
        <p class="why-content-desc">
            <i class="fa-solid fa-circle-check"></i>
            <span class="why-content-desc-text">
                Interactive lessons, "on-the-go" practice, peer support.
            </span>
        </p>
        <p class="why-content-desc">
            <i class="fa-solid fa-circle-check"></i>
            <span class="why-content-desc-text">
                Interactive lessons, "on-the-go" practice, peer support.
            </span>
        </p>
    </div>
    <div class="why-learn-macbook-devices">
        <img src="./images/hapo_learn_why_learn_macbook_2.png" alt="ảnh macbook" class="why-learn-macbook-devices-img">
    </div>
</div>
<!-- End why learn -->

<!-- Begin feedback -->
<div class="feedback other-courses">
    <div class="other-courses-title">Feedback</div>
    <div class="feedback-desc">
        <p class="feedback-text">What other students turned professionals have to say about us after learning
            with us and reaching their goals</p>
    </div>
    <div class="feedback-carousel">
        @foreach ($reviews as $review)
        <div class="feedback-content">
            <div class="feedback-box">
                <p class="feedback-box-content">{{ $review->comments }}</p>
            </div>
            <div class="feedback-user">
                <div class="feedback-avatar">
                    <img src="{{ $review->user->avatar }}" alt="Ảnh avatar" class="feedback-avatar-img">
                </div>
                <div class="feedback-user-info">
                    <p class="feedback-user-info-name">{{ $review->user->full_name }}</p>
                    <p class="feedback-user-info-lang">{{ $review->user->job }}</p>
                    @if ($review->vote === 1)
                    <div class="feedback-user-star">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_w.png" alt="star-white">
                        <img src="./images/star_w.png" alt="star-white">
                        <img src="./images/star_w.png" alt="star-white">
                        <img src="./images/star_w.png" alt="star-white">
                    </div>
                    @elseif ($review->vote === 2)
                    <div class="feedback-user-star">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_w.png" alt="star-white">
                        <img src="./images/star_w.png" alt="star-white">
                        <img src="./images/star_w.png" alt="star-white">
                    </div>
                    @elseif ($review->vote === 3)
                    <div class="feedback-user-star">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_w.png" alt="star-white">
                        <img src="./images/star_w.png" alt="star-white">
                    </div>
                    @elseif ($review->vote === 4)
                    <div class="feedback-user-star">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_w.png" alt="star-white">
                    </div>
                    @else
                    <div class="feedback-user-star">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                        <img src="./images/star_y.png" alt="star-yellow">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- End feedback -->

<!-- Begin start learn -->
<div class="start-learn">
    <div class="start-learn-content">
        <p class="start-learn-title">Become a member of our
            growing community!</p>
        <button class="start-learn-btn btn">Start Learning Now!</button>
    </div>
</div>
<!-- End start learn -->

<!-- Begin statistic hapolearn -->
<div class="statistic other-courses">
    <div class="other-courses-title">Statistic</div>
    <div class="statistic-counter">
        <div class="statistic-counter-item">
            <p class="statistic-counter-title">Courses</p>
            <p class="statistic-counter-number">{{ $countCourses }}</p>
        </div>
        <div class="statistic-counter-item">
            <p class="statistic-counter-title">Lessons</p>
            <p class="statistic-counter-number">{{ $countLessons }}</p>
        </div>
        <div class="statistic-counter-item">
            <p class="statistic-counter-title">Learners</p>
            <p class="statistic-counter-number">{{ $countLearners }}</p>
        </div>
    </div>
</div>
<!-- End statistic hapolearn -->
@endsection
