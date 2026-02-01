<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminAuthRepositoryInterface;
use Auth;
use Illuminate\Http\Request;
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
        return view( 'admin.auth.login' );
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

    public function adminLogout( Request $request ) {
        Auth::guard( 'admin' )->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route( 'admin.login' );
    }
}
