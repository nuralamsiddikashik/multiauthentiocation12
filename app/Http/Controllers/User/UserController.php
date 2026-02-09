<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

class UserController extends Controller {
    public function create() {
        return view( 'auth.user-registration' );
    }

    // public function store( Request $request ) {
    //     $request->validate( [
    //         'name'     => 'required',
    //         'email'    => 'required|email|unique:users',
    //         'password' => 'required|min:6',
    //         'phone'    => 'required',
    //         'address'  => 'required',
    //         'state'    => 'required', // Division
    //         'city'     => 'required', // District
    //     ] );

    //     User::create( [
    //         'name'     => $request->name,
    //         'email'    => $request->email,
    //         'password' => bcrypt( $request->password ),
    //         'phone'    => $request->phone,
    //         'address'  => $request->address,
    //         'state'    => $request->state, // Division name
    //         'city'     => $request->city, // District name
    //         'zip'      => $request->zip,
    //         'token'    => Str::random( 40 ),
    //         'status'   => 0,
    //     ] );

    //     return back()->with( 'success', 'User created successfully' );
    // }

    public function store( Request $request ) {
        try {

            // 1️⃣ Validate request
            $data = $request->validate( [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users',
                'password' => 'required|string|min:6',
                'phone'    => 'required|string|max:20',
                'address'  => 'required|string',
                'state'    => 'required|string', // Division
                'city'     => 'required|string', // District
                'zip'      => 'nullable|string|max:20',
            ] );

            // 2️⃣ Create user
            User::create( [
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => bcrypt( $data['password'] ),
                'phone'    => $data['phone'],
                'address'  => $data['address'],
                'state'    => $data['state'],
                'city'     => $data['city'],
                'zip'      => $data['zip'] ?? null,
                'token'    => Str::random( 40 ),
                'status'   => 0,
            ] );

            // 3️⃣ Success toast
            return back()->with( 'toast', [
                'type'    => 'success',
                'message' => 'User created successfully',
            ] );

        } catch ( Throwable $e ) {

            // 4️⃣ Error logging
            Log::error( 'User Store Error', [
                'error' => $e->getMessage(),
                'email' => $request->email ?? null,
                'ip'    => $request->ip(),
            ] );

            return back()
                ->withInput()
                ->with( 'toast', [
                    'type'    => 'error',
                    'message' => 'Something went wrong. Please try again.',
                ] );
        }
    }

}
