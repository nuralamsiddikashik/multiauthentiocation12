<?php

namespace App\Repositories\Admin;

interface AdminAuthRepositoryInterface {
    public function findByEmail( string $email );
    public function attemptLogin( array $credentials ): bool;
}
