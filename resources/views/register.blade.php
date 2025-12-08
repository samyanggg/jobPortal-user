<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Job Portal</title>
  <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>
<body>
  <div class="register-container">
    <div class="form-box">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Job Portal Logo" class="logo">

      <h2>JOB PORTAL</h2>
      <form id="registerForm">
        <input type="text" placeholder="Name" id="name" required>
        <input type="text" placeholder="Phone Number" id="phone" required>
        <input type="email" placeholder="Email" id="email" required>
    
        <div class="password-field">
          <input type="password" placeholder="Password" id="password" required>
          <span class="toggle-password">👁️</span>
        </div>

        <button type="submit">Register</button>
      </form>

      <p class="login-text">
        Already have an account?
        <a href="{{ url('/login') }}">Login here</a>
      </p>
    </div>
  </div>

  <script src="{{ asset('assets/js/register.js') }}"></script>
</body>
</html>
