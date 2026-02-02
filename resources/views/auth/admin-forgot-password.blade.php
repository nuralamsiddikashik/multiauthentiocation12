@extends('layouts.frontend')

@section('content')
    <div class="auth-container">
            <div class="auth-box">
                <h2>Forgot Password?</h2>
                <p>Enter your email address and we'll send you a link to reset your password</p>
                
                <form action="{{ route('admin.forgot-password.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" required>
                    </div>
                    
                    <button type="submit" class="btn">Send Reset Link</button>
                </form>
                
                <div class="auth-links">
                    <a>Back to Login</a>
                </div>
                
                <div class="divider">or</div>
                
                <div class="auth-links">
                    Don't have an account? <a onclick="showPage('register')">Sign Up</a>
                </div>
    </div>
@endsection