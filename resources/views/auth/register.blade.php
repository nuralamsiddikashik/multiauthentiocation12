@extends('layouts.frontend')
@section('title', 'User Registration')

@section('content')
<div class="auth-container">
    <div class="auth-box">
        <h2>Create an Account</h2>
        <p>Register to access exclusive features</p>
        
        <form>
            <div class="form-group">
                <label for="register-name">Full Name</label>
                <input type="text" id="register-name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="register-email">Email Address</label>
                <input type="email" id="register-email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="register-password">Password</label>
                <input type="password" id="register-password" placeholder="Create a password" required>
            </div>
            <div class="form-group
">
                <label for="register-confirm-password">Confirm Password</label>
                <input type="password" id="register-confirm-password" placeholder="Confirm your password" required>
            </div>  
            <button type="submit" class="btn">Register</button>
        </form>
        <div class="divider">or</div>
        <div class="auth-links">
            Already have an account? <a onclick="showPage('login')">Login</a>   
        </div>
    </div>
</div>
@endsection