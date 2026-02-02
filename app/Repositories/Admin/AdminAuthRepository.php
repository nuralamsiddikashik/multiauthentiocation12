<?php

namespace App\Repositories\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthRepository implements AdminAuthRepositoryInterface {
    public function findByEmail( string $email ) {
        return Admin::select( 'id', 'email', 'password' )
            ->where( 'email', $email )
            ->first();
    }

    public function attemptLogin( array $credentials ): bool {
        return Auth::guard( 'admin' )->attempt( $credentials );
    }

    public function logout( Request $request ): void {
        Auth::guard( 'admin' )->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
