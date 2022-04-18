<div class="form-current" id="register">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">User name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="@error('name') {{ old('name') }} @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email:</label>
            <input type="email" name="register_email" class="form-control @error('register_email') is-invalid @enderror"
                id="exampleInputPassword1" value="@error('register_email') {{ old('email') }} @enderror">
            @error('register_email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="register_password">Password:</label>
            <input type="password" name="register_password"
                class="form-control @error('register_password') is-invalid @enderror" id="register_password"
                aria-describedby="emailHelp">
            @error('register_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Repeat password:</label>
            <input type="password" name="confirm_password"
                class="form-control @error('confirm_password') is-invalid @enderror" id="exampleInputPassword1">
            @error('confirm_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-login">Register</button>
    </form>
</div>
