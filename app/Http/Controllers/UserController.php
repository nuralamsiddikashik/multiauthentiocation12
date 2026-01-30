<?php

namespace App\Http\Controllers;

class UserController extends Controller {
    public function login() {
        return view( 'auth.user-login' );
    }

    public function register() {
        return view( 'auth.register' );
    }
}
