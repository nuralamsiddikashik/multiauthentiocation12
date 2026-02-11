<?php
namespace App\Repositories\User;

use App\Models\User;

interface UserAuthRepositoryInterface {
    public function create( array $data ): User;
    public function findByEmail( string $email ): ?User;
    public function login( array $credentials ): bool;
}