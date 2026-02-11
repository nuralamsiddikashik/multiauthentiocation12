<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserAuthRepositoryInterface;

class UserController extends Controller {

    public function __construct(
        private UserAuthRepositoryInterface $userAuthRepo ) {
    }

    public function create() {
        return view( 'auth.user-registration' );
    }
}
