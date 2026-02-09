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
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address" required>
                </div>

                <div class="form-group">
                    <label for="zip">Zip</label>
                    <input type="text" id="address" name="zip" placeholder="Enter zip code" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                </div>
                
                <!-- Division -->
                <div class="form-group">
                    <label for="division">Select your division</label>
                    <select id="division" name="state" required>
                        <option value="">Select division</option>
                    </select>
                </div>
                <!-- District -->
                <div class="form-group">
                    <label for="district">Select your division</label>
                    <select id="district" name="city" required>
                        <option value="">Select district</option>
                    </select>
                </div>
                <!-- Upazila (only UI) -->
                <div class="form-group">
                    <label for="upazila">Select your division</label>
                    <select id="upazila"  required>
                        <option value="">Select upazila</option>
                    </select>
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

