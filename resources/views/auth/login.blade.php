@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <style>
        .login-wrapper {
            max-width: 400px;
            margin: 60px auto;
            padding: 24px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .login-wrapper h2 {
            text-align: center;
            margin-bottom: 24px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-check {
            margin-bottom: 16px;
        }

        .form-check label {
            cursor: pointer;
            user-select: none;
        }

        .form-check input[type="checkbox"] {
            margin-right: 8px;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 4px;
        }

        .submit-btn {
            width: 100%;
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #0056b3;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 8px;
            font-size: 14px;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="login-wrapper">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    autocomplete="email">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>

            <button type="submit" class="submit-btn">Login</button>

            @if (Route::has('password.request'))
                <div class="forgot-password">
                    <a href="{{ route('password.reset.direct') }}">Forgot Your Password?</a>
                </div>
            @endif
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const rememberCheckbox = document.getElementById('remember');
            const form = document.getElementById('login-form');

            // Autofill if saved
            if (localStorage.getItem('rememberMe') === 'true') {
                emailInput.value = localStorage.getItem('rememberedEmail') || '';
                passwordInput.value = localStorage.getItem('rememberedPassword') || '';
                rememberCheckbox.checked = true;
            }

            form.addEventListener('submit', () => {
                if (rememberCheckbox.checked) {
                    localStorage.setItem('rememberMe', 'true');
                    localStorage.setItem('rememberedEmail', emailInput.value);
                    localStorage.setItem('rememberedPassword', passwordInput.value);
                } else {
                    localStorage.removeItem('rememberMe');
                    localStorage.removeItem('rememberedEmail');
                    localStorage.removeItem('rememberedPassword');
                }
            });
        });
    </script>
@endsection
