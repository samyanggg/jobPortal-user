<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Job Portal</title>
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>

  <div class="login-container">
    <div class="login-box">
      <img src="{{ asset('assets/images/logo.png') }}" class="logo">

      <h2>JOB PORTAL</h2>

      <!-- LOGIN FORM -->
      <form action="{{ route('login') }}" method="POST">
        @csrf

        <!-- EMAIL -->
        <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
        @error('email')
            <span style="color:red">{{ $message }}</span>
        @enderror

        <!-- PASSWORD -->
        <div class="password-field">
          <input type="password" name="password" placeholder="Password" required>
          <span class="toggle-password">👁️</span>
        </div>
        @error('password')
            <span style="color:red">{{ $message }}</span>
        @enderror

        <!-- REMEMBER ME -->
        <label class="remember">
          <input type="checkbox" name="remember"> Remember Password
        </label>

        <button type="submit">Login</button>
      </form>

      <!-- LINK TO REGISTER -->
      <p class="register-text">
        Don’t have an Account? <a href="{{ route('register') }}">Register here</a>
      </p>
    </div>
  </div>

</body>
</html>
