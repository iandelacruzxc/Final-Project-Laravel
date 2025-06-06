@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<style>
    .reset-wrapper {
        max-width: 420px;
        margin: 60px auto;
        padding: 24px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #f9f9f9;
    }

    .reset-wrapper h2 {
        margin-bottom: 24px;
        text-align: center;
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

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group .error {
        color: red;
        font-size: 14px;
        margin-top: 4px;
    }

    .submit-btn {
        display: block;
        width: 100%;
        background: #007bff;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
    }

    .submit-btn:hover {
        background: #0056b3;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 16px;
        border: 1px solid #c3e6cb;
    }
</style>

<div class="reset-wrapper">
    <h2>Reset Password</h2>

    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.reset.direct.submit') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="submit-btn">Done</button>
    </form>
</div>
@endsection
