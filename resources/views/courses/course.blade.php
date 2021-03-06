<div class="list-course-card">
    <div class="hapo-list-course-head">
        <div class="list-course-logo">
            @if($course->id <= 20)
                <img src="{{ $course->thumbnail }}" alt="list-course-html" class="list-course-img">
            @else
                <img src="{{ asset('storage/'.$course->thumbnail) }}"  class="list-course-img"/>
            @endif
        </div>
        <div class="list-course-content">
            <div class="list-course-content-title">{{ $course->title }}</div>
            <p class="list-course-content-txt">{{ $course->description }}</p>
        </div>
    </div>
    <div class="list-course-btn">
        <a class="list-course-btn-more" href="{{ route('courses.show', $course->id) }}">More</a>
    </div>
    <div class="hapo-list-course-statistic">
        <div class="hapo-list-course-statistic-left">
            <div class="list-course-specical-title">Learners</div>
            <div class="list-course-specical-num">{{ $course->learners }}</div>
        </div>
        <div class="hapo-list-course-statistic-mid">
            <div class="list-course-specical-title">Lessons</div>
            <div class="list-course-specical-num">{{ $course->lessons_count }}</div>
        </div>
        <div class="hapo-list-course-statistic-right">
            <div class="list-course-specical-title">Times</div>
            <div class="list-course-specical-num">{{ $course->time_sum }}</div>
        </div>
    </div>
</div>
