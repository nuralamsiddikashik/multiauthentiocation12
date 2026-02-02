<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use App\Repositories\Admin\AdminAuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class AdminController extends Controller {

    protected AdminAuthRepositoryInterface $adminAuthRepo;

    public function __construct( AdminAuthRepositoryInterface $adminAuthRepo ) {
        $this->adminAuthRepo = $adminAuthRepo;
    }

    public function dashboard() {
        return view( 'admin.dashboard' );
    }

    public function login() {
        return view( 'auth.admin-login' );
    }

    public function admin_login_submit( Request $request ) {
        try {

            $request->validate( [
                'email'    => ['required', 'email'],
                'password' => ['required', 'string', 'min:6'],
            ] );

            $admin = $this->adminAuthRepo->findByEmail( $request->email );

            if ( !$admin ) {

                return back()->withInput()->with( 'toast', [
                    'type'    => 'error',
                    'message' => 'Email address not found',
                ] );

            } elseif ( !$this->adminAuthRepo->attemptLogin( [
                'email'    => $request->email,
                'password' => $request->password,
            ] ) ) {

                return back()->withInput()->with( 'toast', [
                    'type'    => 'error',
                    'message' => 'Incorrect password',
                ] );
            } else {

                $request->session()->regenerate();
                return redirect()
                    ->route( 'admin.dashboard' )
                    ->with( 'toast', [
                        'type'    => 'success',
                        'message' => 'Admin login successful',
                    ] );
            }

        } catch ( Throwable $e ) {

            Log::error( 'Admin Login Error', [
                'error' => $e->getMessage(),
                'email' => $request->email ?? null,
                'ip'    => $request->ip(),
            ] );

            return back()->withInput()->with( 'toast', [
                'type'    => 'error',
                'message' => 'Something went wrong. Please try again.',
            ] );
        }
    }

    public function logout( Request $request ) {
        $this->adminAuthRepo->logout( $request );
        return redirect()->route( 'auth.admin-login' )->with( 'toast', [
            'type'    => 'success',
            'message' => 'Admin logged out successfully',
        ] );
    }

    public function adminForgetPasword() {
        return view( 'auth.admin-forgot-password' );
    }

    public function adminForgotPassowordSubmit( Request $request ) {
        $request->validate( [
            'email' => ['required', 'email'],
        ] );

        $admin = Admin::where( 'email', $request->email )->first();

        if ( !$admin ) {
            return redirect()->back()->with( 'toast', [
                'type'    => 'error',
                'message' => 'Email address not found',
            ] );
        }

        $token        = hash( 'sha256', time() );
        $admin->token = $token;
        $admin->update();

        // ✅ FIXED LINE (IMPORTANT)
        $resetLink = route( 'auth.admin-reset-password', [
            'token' => $token,
            'email' => $request->email,
        ] );

        $subject = 'Password Reset Request';
        $message = "Click the following link to reset your password:<br>";
        $message .= '<a href="' . $resetLink . '">Click here</a>';

        \Mail::to( $request->email )->send(
            new Websitemail( $subject, $message )
        );

        return redirect()->back()->with( 'toast', [
            'type'    => 'success',
            'message' => 'Password reset link has been sent to your email address',
        ] );
    }

    public function adminResetPassword( $token, $email ) {
        $admin = Admin::where( 'email', $email )->where( 'token', $token )->first();

        if ( !$admin ) {
            return redirect()->route( 'auth.admin-login' )->with( 'toast', [
                'type'    => 'error',
                'message' => 'Invalid or expired password reset link',
            ] );
        }

        return view( 'auth.admin-reset-password', compact( 'token', 'email' ) );
    }

    public function adminResetPasswordSubmit( Request $request ) {
        $request->validate( [
            'password'         => ['required', 'string', 'min:6'],
            'confirm_password' => ['required', 'string', 'min:6', 'same:password'],
        ] );
        $admin = Admin::where( 'email', $request->email )->where( 'token', $request->token )->first();

        $admin->password = Hash::make( $request->password );
        $admin->token    = '';
        $admin->update();

        return redirect()->route( 'auth.admin-login' )->with( 'toast', [
            'type'    => 'success',
            'message' => 'Password has been reset successfully. You can now log in with your new password.',
        ] );
    }
}