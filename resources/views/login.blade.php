<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | Job Portal</title>

        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

        <style>
            .error-message {
                color: red;
                font-size: 14px;
            }
        </style>
    </head>

    <body>

        <div class="login-container">
            <div class="login-box">

                <!-- Logo -->
                <img src="{{ asset('assets/images/logo.png') }}" class="logo">

                <h2>JOB PORTAL</h2>

                <!-- SUCCESS MESSAGE -->
                @if(session('success'))
                    <p style="color: green; text-align:center;">{{ session('success') }}</p>
                @endif

                <!-- GENERAL LOGIN ERROR -->
                @if($errors->has('login_error'))
                    <p style="color:red; text-align:center;">{{ $errors->first('login_error') }}</p>
                @endif

                <!-- LOGIN FORM -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- EMAIL -->
                    <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror

                    <!-- PASSWORD -->
                    <div class="password-field">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <span class="toggle-password" data-target="password">👁️</span>
                    </div>
                    @error('password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror

                    <!-- REMEMBER ME -->
                    <label class="remember">
                        <input type="checkbox" name="remember"> Remember Password
                    </label>

                    <!-- LOGIN BUTTON -->
                    <button type="submit">Login</button>
                </form>

                <!-- LINK TO REGISTER -->
                <p class="register-text">
                    Don’t have an Account? <a href="{{ route('register') }}">Register here</a>
                </p>

            </div>
        </div>

        <!-- SHOW / HIDE PASSWORD SCRIPT -->
        <script>
            document.querySelectorAll(".toggle-password").forEach(toggle => {
                toggle.addEventListener("click", function () {
                    let target = this.getAttribute("data-target");
                    let input = document.getElementById(target);

                    if (input.type === "password") {
                        input.type = "text";
                        this.textContent = "🙈";
                    } else {
                        input.type = "password";
                        this.textContent = "👁️";
                    }
                });
            });
        </script>

    </body>
</html>
