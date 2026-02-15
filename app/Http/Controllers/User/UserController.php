<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;
use App\Models\Notification;
use App\Repositories\User\UserAuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller {

    public function __construct(
        private UserAuthRepositoryInterface $userAuthRepo ) {
    }

    public function create() {
        return view( 'auth.user-registration' );
    }

    public function login() {
        return view( 'auth.user-login' );
    }

    public function dashboard() {
        return view( 'user.dashboard' );
    }

    public function store( UserRegisterRequest $request ) {
        try {
            // ✅ Wrap in transaction
            $user = DB::transaction( function () use ( $request ) {
                // 1️⃣ Create user via repository
                $user = $this->userAuthRepo->create( $request->validated() );

                // 2️⃣ Create admin notification
                Notification::create( [
                    'user_id' => $user->id,
                    'message' => "New user '{$user->name}' registered and pending approval",
                ] );

                return $user;
            } );

            // 3️⃣ Success toast
            return redirect()
                ->route( 'home' )
                ->with( 'toast', [
                    'type'    => 'success',
                    'message' => 'Registration successful. Please log in.',
                ] );

        } catch ( Throwable $e ) {
            // 4️⃣ Log the error
            Log::error( 'User Registration Error: ', [
                'error' => $e->getMessage(),
                'email' => $request->email ?? null,
                'ip'    => $request->ip(),
            ] );

            // 5️⃣ Return error toast
            return back()
                ->withInput()
                ->with( 'toast', [
                    'type'    => 'error',
                    'message' => 'Registration failed. Please try again.',
                ] );
        }
    }

    public function userLoginStore( Request $request ) {
        $request->validate( [
            'email'    => 'required|email',
            'password' => 'required',
        ] );

        $user = $this->userAuthRepo->findByEmail( $request->email );

        if ( !$user ) {
            return back()
                ->withInput()
                ->with( 'toast', [
                    'type'    => 'error',
                    'message' => 'No user found with this email.',
                ] );
        }

        if ( $user->status != 1 ) {
            return back()
                ->withInput()
                ->with( 'toast', [
                    'type'    => 'error',
                    'message' => 'Account not active',
                ] );
        }

        if ( !$this->userAuthRepo->login( $request->only( ['email', 'password'] ) ) ) {
            return back()->with( 'toast', [
                'type'    => 'error',
                'message' => 'Invalid password',
            ] );
        }

        return redirect()->route( 'user.dashboard' )->with( 'toast', [
            'type'    => 'success',
            'message' => 'Login successful.',
        ] );
    }
}
