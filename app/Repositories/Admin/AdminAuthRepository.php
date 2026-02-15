<?php

namespace App\Repositories\Admin;

use App\Models\Admin;
use App\Models\User;
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

    public function updateStatus( int $userId, int $status ): bool {
        return User::where( 'id', $userId )->update( [
            'status' => $status,
        ] );
    }
}
