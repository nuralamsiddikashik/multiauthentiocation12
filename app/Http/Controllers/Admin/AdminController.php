<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller {

    public function dashboard() {
        return view( 'admin.dashboard' );
    }

    public function login() {
        return view( 'admin.auth.login' );
    }

    public function admin_login_submit( Request $request ) {

        $credentials = $request->validate( [
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ] );

        if ( !Auth::guard( 'admin' )->attempt( $credentials ) ) {
            throw ValidationException::withMessages( [
                'email' => 'Invalid email or password.',
            ] );
        }
        $request->session()->regenerate();

        // 4️⃣ Redirect safely
        return redirect()->intended( route( 'admin.dashboard' ) );
    }

    public function adminLogout( Request $request ) {
        Auth::guard( 'admin' )->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route( 'admin.login' );
    }
}
