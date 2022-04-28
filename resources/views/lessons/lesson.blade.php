<div class="lessons-list">
    @foreach ($lessons as $key => $lesson)
    <div class="lessons-item row">
        @if (isset($request['page']))
        <p class="col-md-9 lesson-item-title">{{ ($request['page'] - 1) * config('filter.item_page_lessons') + $key + 1
            }}. {{ $lesson->description }}</p>
        @else
        <p class="col-md-9 lesson-item-title">{{ $key + 1 }}. {{ $lesson->description }}</p>
        @endif
        <p class="col-md-3 btn-learn"><a href="{{ route('courses.lesson.show', [$course->id, $lesson->id]) }}"
                class="button-custom-circle button">Learn</a></p>
    </div>
    @endforeach
    {!! $lessons->links() !!}
</div>
