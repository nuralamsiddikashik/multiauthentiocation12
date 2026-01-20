@extends('layouts.frontend')
@section('title', 'User Login')


@section('content')

<div class="auth-container">
            <div class="auth-box">
                <h2>Welcome Back</h2>
                <p>Please login to your account</p>
                
                <form>
                    <div class="form-group">
                        <label for="login-email">Email Address</label>
                        <input type="email" id="login-email" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" placeholder="Enter your password" required>
                    </div>
                    
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                    
                    <button type="submit" class="btn">Login</button>
                </form>
                
                <div class="auth-links">
                    <a onclick="showPage('forgot-password')">Forgot Password?</a>
                </div>
                
                <div class="divider">or</div>
                
                <div class="auth-links">
                    Don't have an account? <a onclick="showPage('register')">Sign Up</a>
                </div>
            </div>
        </div>
    </div>

@endsection