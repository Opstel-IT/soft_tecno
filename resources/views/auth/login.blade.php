<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="{{asset('assets/css/AdminLoginStyle.css')}}">
</head>
<body>

    <div class="form">
        <div class="form-container">
            <div class="form-header">
                <h2>Edu To Success</h2>
                <p>Welcome To User Login</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
            <span class="invalid-feedback" role="alert">
                <strong style="color: red; text-align:center;"> @error('email'){{ $message }} @enderror</strong>
            </span>
            @csrf
                <div class="email" style="margin-top: 15px;">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="margin-bottom: 10px;">
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required autocomplete="current-password" style="margin-bottom: 10px;">
                </div>
                <div class="checkbox-b">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>

                <div class="submit-s">
                    <button type="submit">LOGIN</button>
                </div>
            </form>
        </div>
    </div>


</body>
</html>
