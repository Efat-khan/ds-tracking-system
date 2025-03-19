@if (Route::has('login'))
<nav class="flex items-center justify-end gap-4">
    @auth('web')
    <a href="{{ url('/dashboard') }}">
        Dashboard
    </a>
    @else
    <a href="{{ route('login') }}">
        Log in
    </a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}">
        Register
    </a>
    @endif
    @endauth
    @auth('admin')
    <a
        href="{{ url('admin/dashboard') }}">
        Admin Dashboard
    </a>
    @else
    <a href="{{ route('admin.login') }}">
        Admin Log in
    </a>

    @if (Route::has('admin.register'))
    <a href="{{ route('admin.register') }}">
        Admin Register
    </a>
    @endif
    @endauth
</nav>
@endif
</header>
@if (Route::has('login'))
<div class="h-14.5 hidden lg:block"></div>
@endif
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DS Management System - Login </title>
    <!-- google font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('frontEnd/css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('frontEnd/css/entry-page.css')}}" />
  </head>
  <body>
    <div class="row height-full">
      <!-- left side -->
      <div
        class="left-column flex flex-column height-full justify-center items-center"
      >
        <h1 class="welcoming-title">Welcome back</h1>
        <form class="form" autocomplete="off">
          <label for="email" class="label">Email</label>
          <input type="email" name="email" id="email" class="input" required />

          <label for="password" class="label">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            class="input"
            required
          />

          <button
            type="submit"
            class="button regular-button pink-background cta-btn"
          >
            Log in
          </button>
        </form>
        <p class="sign-up-prompt">
          Don’t have an account?
          <a href="./signup.html" class="sign-up-link">Sign up</a>
        </p>
      </div>
      <!-- right side -->
      <div class="right-column"></div>
    </div>
  </body>
</html>
