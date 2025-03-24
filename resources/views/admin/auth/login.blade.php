

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DS Management System - Admin Login</title>
    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/css/entry-page.css') }}" />
</head>

<body>
    <div class="row height-full">
        <!-- Left Side -->
        <div class="left-column flex flex-column height-full justify-center items-center">
            <h1 class="welcoming-title">Admin Login</h1>

            <form class="form" autocomplete="off" method="POST" action="{{ route('admin.login') }}">
                @csrf
                <!-- Email -->
                <label for="email" class="label">Email</label>
                <input type="email" name="email" id="email" class="input" value="{{ old('email') }}" required />
                @if ($errors->has('email'))
                <div class="alert alert-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
                @endif
                <!-- Password -->
                <label for="password" class="label">Password</label>
                <input type="password" name="password" id="password" class="input" required autocomplete="current-password" />
                @if ($errors->has('password'))
                <div class="alert alert-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
                @endif
                <!-- Submit Button -->
                <button type="submit" class="button regular-button pink-background cta-btn">
                    Log in
                </button>

                <!-- Remember Me -->
                <div class="remember-me-container">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <!-- Forgot Password -->
                <p class="sign-up-prompt">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                    @endif
                </p>
            </form>

            <!-- Sign Up Prompt -->
            <p class="sign-up-prompt">
                Don’t have an account?
                <a href="{{ route('register') }}" class="sign-up-link">Sign up</a>
            </p>
        </div>

        <!-- Right Side -->
        <div class="right-column"></div>
    </div>
</body>

</html>
