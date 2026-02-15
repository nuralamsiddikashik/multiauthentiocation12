@extends('layouts.frontend')

@section('content')
    <div class="auth-container">
        <div class="auth-box">
            <h2>Create Account</h2>
            <p>Sign up to get started</p>
            
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address" required>
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="Enter your state" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="Enter your city" required>
                </div>
                
                <div class="form-group">
                    <label for="zip">Zip Code</label>
                    <input type="text" id="zip" name="zip" placeholder="Enter your zip code" required>
                </div>

             
                
                <button type="submit" class="btn">Create Account</button>
            </form>
            
            <div class="divider">or</div>
            
            <div class="auth-links">
                Already have an account? <a onclick="showPage('login')">Login</a>
            </div>
        </div>
</div>
    
@endsection

