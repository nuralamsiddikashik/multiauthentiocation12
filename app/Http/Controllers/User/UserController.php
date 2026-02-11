<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserController extends Controller {
    public function create() {
        return view( 'auth.user-registration' );
    }

    
}
