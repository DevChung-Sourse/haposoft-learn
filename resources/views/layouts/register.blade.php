<div class="form-current" id="register">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">User name:</label>
            <input type="text" name="register_name" class="form-control @error('register_name') is-invalid @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('register_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">Email:</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                id="exampleInputPassword1">
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="register_password"
                class="form-control @error('register_password') is-invalid @enderror" id="password"
                aria-describedby="emailHelp">
        </div>
        @error('register_password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">Repeat password:</label>
            <input type="password" name="confirm_password"
                class="form-control @error('confirm_password') is-invalid @enderror" id="exampleInputPassword1">
        </div>
        @error('confirm_password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit" class="btn btn-login">Register</button>
    </form>
</div>
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
