@extends('layouts.frontend')

@section('content')
    <div class="auth-container">
            <div class="auth-box">
                <h2>Reset Password</h2>
                <p>Enter your new password below</p>
                
                <form action="{{ route('admin.reset-password.submit', [$token,$email]) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter new password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm new password" required>
                    </div>
                    <button type="submit" class="btn">Reset Password</button>
                </form>  
    </div>
    <div>
@endsection