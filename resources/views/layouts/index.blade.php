<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-page">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="form">
                        <div class="form-switch">
                            <p class="form-lr active-lr" id="formLogin"><a href="#">Login</a></p>
                            <p class="form-lr" id="formRegister"><a href="#">Register</a></p>
                        </div>
                        @include('layouts.login')
                        @include('layouts.register')
                        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
