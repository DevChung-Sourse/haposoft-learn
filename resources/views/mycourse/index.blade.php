@extends('layouts.index')

@section('content')

<div class="container-detail d-flex justify-content-center align-items-center">
    <div class="mt-5" style="width: 90%; background: #fff;">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Name course</th>
                    <th class="text-center" scope="col">Price</th>
                    <th class="text-center" scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userCourses as $key => $value)
                <tr>
                    <th class="text-center" scope="row">{{ $key + 1 }}</th>
                    <td class="text-center">{{ $value->title }}</td>
                    <td class="text-center">{{ $value->price }}</td>
                    <td class="text-center"><a href="{{ route('courses.show', $value->id) }}">Learn</a></td>
                </tr>
                @endforeach
                <tr>
                    <td class="text-center" colspan="2"><h3>Total price: </h3></td>
                    <td class="text-center" colspan="2">{{ $totalPrice }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
