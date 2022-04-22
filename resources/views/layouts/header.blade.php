<div class="nav">
    <div class="nav-box">
        <img src="{{ asset('/images/logo_hapolearn.png') }}" alt="Logo haposoft learn" class="nav-box-img">
    </div>
    <ul class="nav-menu" id="menu">
        <li class="nav-menu-item"><a href="#" class="nav-menu-item-link">Home</a></li>
        <li class="nav-menu-item active"><a href="{{ route('courses.index') }}" class="nav-menu-item-link">All courses</a></li>
        @if (Auth::check())
        <div class="dropdown show border-0">
            <a class="btn btn-secondary dropdown-toggle custom-dropdown" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-user-tie"></i> {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item custom-profile" href="#"><i class="fa-solid fa-address-card"></i>Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-logout py-1"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                    </form>
            </div>
        </div>
        @else
        <li class="nav-menu-item"><a href="" class="nav-menu-item-link" data-toggle="modal"
                data-target="#loginModal">Login/register</a></li>
        <li class="nav-menu-item"><a href="#" class="nav-menu-item-link">Profile</a></li>
        @endif
    </ul>
    <div class="nav-icon"><i class="fa-solid fa-bars nav-bar-icon"></i></div>
</div>
