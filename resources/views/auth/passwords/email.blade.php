@extends('layouts.index')

@section('content')
<div class="reset-container d-flex justify-content-center align-items-center">
    <div class="d-flex flex-column justify-content-center align-items-center reset-box">
        <p class="reset-title">Reset Password</p>
        <p class="reset-subtitle">Enter email to reset your password</p>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" class="reset-form-custom" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group d-flex flex-column align-items-start">
                <label for="email" class="col-form-label label-email text-md-right">Email</label>

                <div class="input-form">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0 d-flex">
                <div class="col-md-8">
                    <button type="submit" class="button-custom-circle border-0 px-4">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
