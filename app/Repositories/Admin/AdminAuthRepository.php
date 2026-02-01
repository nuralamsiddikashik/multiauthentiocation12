<?php

namespace App\Repositories\Admin;

use App\Models\Admin;
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
}
