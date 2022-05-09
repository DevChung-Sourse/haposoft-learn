<div class="lessons-list">
    @foreach ($lessons as $key => $lesson)
    <div class="lessons-item row">
        @if (isset($request['page']))
        <p class="col-md-9 lesson-item-title">{{ ($request['page'] - 1) * config('filter.item_page_lessons') + $key + 1
            }}. {{ $lesson->description }}</p>
        @else
        <p class="col-md-9 lesson-item-title">{{ $key + 1 }}. {{ $lesson->description }}</p>
        @endif
        @if (Auth::user() != null && Auth::user()->getUserCourse($course->id))
        <p class="col-md-3 btn-learn"><a href="{{ route('courses.lesson.show', [$course->id, $lesson->id]) }}"
                class="button-custom-circle button {{ Auth::user()->addClassLearnedButton($lesson->id) }}">{{
                Auth::user()->formatTextLearnButton($lesson->id) }}</a></p>
        @else
        <p class="col-md-3 btn-learn"><button disabled="disabled"
                class="button-custom-circle button text-light bg-secondary border-0">Learn</button></p>
        @endif
    </div>
    @endforeach
    {!! $lessons->links() !!}
</div>
