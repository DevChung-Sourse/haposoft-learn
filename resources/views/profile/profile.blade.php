@extends('layouts.index')

@section('content')
<div class="container-detail d-flex justify-content-center align-items-center">
    <form class="row profile" action="{{ route('user-profile.update', Auth::id()) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-md-3">
            <div class="profile-title">
                <label for="file" class="profile-img">
                    @if(Auth::user()->avatar === null)
                    <div class="profile-avatar-icon"><i class="fa-solid fa-camera"></i></div>
                    <input type="file" name="file" id="file" class="input-file"
                        onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0])">
                    <img id="avatar" />
                    @else
                    <input type="file" name="file" id="file" class="input-file"
                        onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0])">
                    <img src="{{ Auth::user()->avatar }}" id="avatar" alt="Avatar image">
                    @endif
                </label>
                <div class="profile-name">
                    <p class="name">{{ Auth::user()->getFormatFullNameAttribute(Auth::user()->full_name) }}</p>
                </div>
                <div class="profile-email">
                    <p class="email">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="profile-info">
                <div class="profile-infor"><i class="fa-solid fa-cake-candles"></i>{{ Auth::user()->format_value_date }}
                </div>
                <div class="profile-infor"><i class="fa-solid fa-phone"></i>{{ Auth::user()->format_value_phone }}</div>
                <div class="profile-infor"><i class="fa-solid fa-house-chimney"></i>{{
                    Auth::user()->format_value_address }}</div>
                <div class="profile-info-about">{{ Auth::user()->getFormatAboutMeAttribute(Auth::user()->about_me) }}</div>
            </div>
        </div>
        <div class="profile-right col-md-9">
            <div class="profile-right-content float-right">
                <div class="profile-courses">
                    <p class="profile-courses-title">My courses</p>
                    <div class="line"></div>
                    <div class="profile-courses-item">
                        @foreach ($myCourses as $myCourse)
                        <div class="profile-item-course">
                            <img src="{{ $myCourse->thumbnail }}" alt="My courses" class="profile-item-img">
                            <p class="profile-item-title">{{ $myCourse->title }}</p>
                        </div>
                        @endforeach
                        <div class="add_my_courses profile-item-course">
                            <div class="profile-item-add"><a href="{{ route('courses.index') }}">+</a></div>
                            <p class="profile-item-title color-title-add-more">Add more</p>
                        </div>
                    </div>
                </div>
                <div class="profile-courses mt-0">
                    <p class="profile-courses-title">Edit profile</p>
                    <div class="line"></div>
                    <div class="row custom-form">
                        <div class="row custom-input">
                            <div class="col-md-6">
                                <label for="full_name">Full name:</label><br>
                                <input type="text" class="input" name="full_name" id="full_name" value="{{ Auth::user()->full_name ?? "" }}"
                                    placeholder="Your name...">
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Phone:</label><br>
                                <input type="text" class="input" name="phone" id="phone" value="{{ Auth::user()->phone ?? "" }}"
                                    placeholder="Your phone number...">
                            </div>
                        </div>
                        <div class="row custom-input">
                            <div class="col-md-6">
                                <label for="birthday">Date of birthday:</label><br>
                                <input type="date" class="input" name="birthday" id="birthday" value="{{ Auth::user()->birthday ?? "" }}"
                                    placeholder="Your birthday...">
                            </div>
                            <div class="col-md-6">
                                <label for="address">Address:</label><br>
                                <input type="text" class="input" name="address" id="address" value="{{ Auth::user()->address ?? "" }}"
                                    placeholder="Your address...">
                            </div>
                        </div>
                        <div class="row custom-input">
                            <div class="col-md-12">
                                <label for="about">About me:</label><br>
                                <textarea class="about-me" id="about" name="about" rows="3" value="{{ old('about') }}"></textarea>
                            </div>
                        </div>
                        <div class="row custom-button">
                            <button type="submit" class="col-md-5 border-0 button-custom-circle">Edit profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
