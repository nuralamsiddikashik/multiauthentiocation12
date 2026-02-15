<?php
namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthRepository implements UserAuthRepositoryInterface {

    public function create( array $data ): User {
        return User::create( [
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make( $data['password'] ),
            'phone'    => $data['phone'] ?? null,
            'address'  => $data['address'] ?? null,
            'state'    => $data['state'] ?? null,
            'city'     => $data['city'] ?? null,
            'zip'      => $data['zip'] ?? null,
            'token'    => \Str::random( 40 ),
            'status'   => 0, // pending
        ] );
    }

    public function findByEmail( string $email ): ?User {
        return User::where( 'email', $email )->first();
    }

    public function login( array $credentials ): bool {
        return Auth::guard( 'user' )->attempt( $credentials );
    }
}
