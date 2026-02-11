@extends('layouts.frontend')
@section('content')
    <div class="auth-container">
        <div class="auth-box">
            <h2>User Login</h2>
            <p>Sign in to access your account</p>
            
            <form method="POST" action="{{ route('user.login.store') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>

            <div class="divider">or</div>

            <div class="auth-links">
                Don't have an account? <a>Register</a>
            </div>
        </div>
    </div>
@endsection