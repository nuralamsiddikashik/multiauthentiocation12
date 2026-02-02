@extends('layouts.frontend')

@section('content')
<div class="auth-container">
    <div class="auth-box">
        <h2 class="auth-title">Welcome Back 👋</h2>
        <p class="auth-subtitle">Login to continue to your dashboard</p>

        {{-- Validation Errors (fallback) --}}
        @if ($errors->any())
            <div class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            {{-- Email --}}
            <div class="form-group">
                <label for="login-email">Email Address</label>
                <input
                    type="email"
                    id="login-email"
                    name="email"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    class="{{ session('toast.message') === 'Email address not found' ? 'input-error' : '' }}"
                >
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="login-password">Password</label>
                <input
                    type="password"
                    id="login-password"
                    name="password"
                    placeholder="Enter your password"
                    class="{{ session('toast.message') === 'Incorrect password' ? 'input-error' : '' }}"
                >
            </div>

            <button type="submit" class="btn btn-primary w-full">
                Login
            </button>
        </form>

        <div class="auth-links">
            <a href="{{ route('auth.admin-forgot-password') }}">Forgot password?</a>
        </div>

        <div class="divider">OR</div>

        <div class="auth-links">
            Don’t have an account?
            <a href="#" onclick="showPage('register')">Create one</a>
        </div>
    </div>
</div>
@endsection
