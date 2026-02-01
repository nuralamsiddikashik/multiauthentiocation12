@extends('layouts.frontend')
@section('content')

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div>
        {{ session('error') }}
    </div>  
    
@endif
    
        <div class="auth-container">
            <div class="auth-box">
                <h2>Welcome Back</h2>
                <p>Please login to your account</p>
                
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="login-email">Email Address</label>
                        <input type="email" id="login-email" placeholder="Enter your email" name="email">
                    </div>
                    
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" placeholder="Enter your password" name="password">
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
@endsection
