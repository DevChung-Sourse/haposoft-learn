<div class="form-current active-display" id="login">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        @if (session()->has('message'))
        <div class="alert alert-success" id="success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control"
                id="email @error('email') is-invalid login @enderror" aria-describedby="emailHelp">
            @error ('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid login @enderror"
                id="password">
        </div>
        <div class="form-check check">
            <input type="checkbox" class="form-check-input" name="rememberme" id="checkbox" value="true">
            <label class="form-check-label" for="checkbox">Remember me</label>
            <p class="text">Forgot password</p>
        </div>
        @if (session()->has('error'))
        <div class="alert alert-danger" id="error">
            {{ session()->get('error') }}
        </div>
        @endif
        <button type="submit" class="btn btn-login">Login</button>
    </form>
    <div class="login-with">
        <p class="login-with-text">Login with</p>
        <div class="login-with-social">
            <button class="btn-login-with btn-google">
                <i class="fa-brands fa-google-plus-g icon"></i>
                <span>Google</span>
            </button>
            <button class="btn-login-with btn-facebook">
                <i class="fa-brands fa-facebook-f icon"></i>
                <span>Facebook</span>
            </button>
        </div>
    </div>
</div>
