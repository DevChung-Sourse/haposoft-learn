<div class="nav">
    <div class="nav-box">
        <img src="{{ asset('/images/logo_hapolearn.png') }}" alt="Logo haposoft learn" class="nav-box-img">
    </div>
    <ul class="nav-menu" id="menu">
        <li class="nav-menu-item"><a href="{{ route('home') }}" class="nav-menu-item-link">Home</a></li>
        <li class="nav-menu-item"><a href="{{ route('courses.index') }}" class="nav-menu-item-link">All courses</a></li>
        @if (Auth::check())
        <div class="dropdown show border-0">
            <a class="btn btn-secondary dropdown-toggle custom-dropdown" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-user-tie"></i> {{ Auth::user()->name }}
            </a>
            {{-- @dd(Auth::user()->getTeacher()) --}}
            <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuLink" style="width: 250px !important;">
                @if(Auth::user()->getTeacher())
                <a class="dropdown-item custom-profile" href="{{ route('manager-course.index') }}"><i class="fa-solid fa-people-roof"></i>Courses management</a>
                @endif
                <a class="dropdown-item custom-profile" href="{{ route('my-course.index') }}"><i class="fa-solid fa-book-bookmark"></i>My courses</a>
                <a class="dropdown-item custom-profile" href="{{ route('user-profile.index') }}"><i class="fa-solid fa-address-card"></i>Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout py-1"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                </form>
            </div>
        </div>
        @else
        <li class="nav-menu-item"><a href="" class="nav-menu-item-link" data-toggle="modal"
                data-target="#loginModal">Login/register</a></li>
        @endif
    </ul>
    <div class="nav-icon"><i class="fa-solid fa-bars nav-bar-icon"></i></div>
</div>
