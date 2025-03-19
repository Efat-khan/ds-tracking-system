<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DS Management System - Signup</title>

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
        <!-- left side -->
        <div
            class="left-column flex flex-column height-full justify-center items-center">
            <h1 class="welcoming-title">User Registration</h1>
            <form method="POST" class="form" autocomplete="off" action="{{ route('register') }}">
                @csrf
                <label for="name" class="label">Name</label>
                <input type="text" name="name" id="name" class="input" value="{{old('name')}}" required />
                @if ($errors->has('name'))
                <div class="alert alert-danger mt-2">
                    {{ $errors->first('name') }}
                </div>
                @endif
                <label for="phone" class="label">Phone</label>
                <input type="text" name="phone" id="phone" class="input" value="{{old('phone')}}" required />
                @if($errors->has('phone'))
                <div class="alert alert-danger mt-2">
                    {{ $errors->first('phone') }}
                </div>
                @endif
                <label for="email" class="label">Email</label>
                <input type="email" name="email" id="email" class="input" value="{{old('email')}}" required />
                @if ($errors->has('email'))
                <div class="alert alert-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
                @endif
                <label for="password" class="label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="input"
                    required autocomplete="new-password" />
                @if ($errors->has('password'))
                <div class="alert alert-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
                @endif
                <label for="password_confirmation" class="label">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="input"
                    required autocomplete="new-password" />
                @if ($errors->has('password_confirmation'))
                <div class="alert alert-danger mt-2">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif
                <button
                    type="submit"
                    class="button regular-button pink-background cta-btn">
                    Sign up
                </button>
            </form>
            <p class="login-prompt">
                Already have an account?
                <a href="{{ route('login') }}" class="log-in-link">Log in</a>
            </p>
        </div>
        <!-- right side -->
        <div class="right-column"></div>
    </div>
</body>

</html>
