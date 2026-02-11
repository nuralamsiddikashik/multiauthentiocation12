<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagmentController extends Controller {
    public function index( Request $request ) {
        $users = User::query();

        if ( $search = $request->get( 'search' ) ) {
            $users->where( 'name', 'like', "%{$search}%" )
                ->orWhere( 'email', 'like', "%{$search}%" );
        }

        $users = $users->get();

        // Fetch unread notifications
        $notifications = Notification::where( 'is_read', 0 )->orderBy( 'created_at', 'desc' )->get();

        return view( 'admin.user-list', compact( 'users', 'notifications' ) );
    }

}
