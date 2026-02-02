<?php

namespace App\Repositories\Admin;

use Illuminate\Http\Request;

interface AdminAuthRepositoryInterface {
    public function findByEmail( string $email );
    public function attemptLogin( array $credentials ): bool;

    public function logout( Request $request ): void;
}
