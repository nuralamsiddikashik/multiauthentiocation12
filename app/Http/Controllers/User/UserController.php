<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller {
    public function create() {
        return view( 'auth.user-registration' );
    }

    public function store( Request $request ) {
        $request->validate( [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone'    => 'required',
            'address'  => 'required',
            'state'    => 'required', // Division
            'city'     => 'required', // District
        ] );

        User::create( [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt( $request->password ),
            'phone'    => $request->phone,
            'address'  => $request->address,
            'state'    => $request->state, // Division name
            'city'     => $request->city, // District name
            'zip'      => $request->zip,
            'token'    => Str::random( 40 ),
            'status'   => 0,
        ] );

        return back()->with( 'success', 'User created successfully' );
    }
}
