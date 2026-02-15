<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagmentController;
use Illuminate\Support\Facades\Route;

Route::prefix( 'admin' )->group( function () {

    Route::middleware( 'admin.guest' )->group( function () {
        Route::get( '/login', [AdminController::class, 'login'] )
            ->name( 'auth.admin-login' );

        Route::post( '/login', [AdminController::class, 'admin_login_submit'] )
            ->name( 'admin.login.submit' );

        Route::get( '/forgot-password', [AdminController::class, 'adminForgetPasword'] )
            ->name( 'auth.admin-forgot-password' );

        Route::post( '/forgot-password-submit', [AdminController::class, 'adminForgotPassowordSubmit'] )
            ->name( 'admin.forgot-password.submit' );

        Route::get( '/admin-reset-password/{token}/{email}', [AdminController::class, 'adminResetPassword'] )
            ->name( 'auth.admin-reset-password' );

        Route::post( '/admin-reset-password/{token}/{email}', [AdminController::class, 'adminResetPasswordSubmit'] )
            ->name( 'admin.reset-password.submit' );

    } );

    Route::middleware( 'admin' )->group( function () {
        Route::get( '/dashboard', [AdminController::class, 'dashboard'] )
            ->name( 'admin.dashboard' );

        Route::post( '/logout', [AdminController::class, 'logout'] )
            ->name( 'admin.logout' );

        Route::get( 'users/list', [UserManagmentController::class, 'index'] )->name( 'admin.users.list' );

        Route::patch( '/users/{user}/status', [AdminController::class, 'updateStatus'] )
            ->name( 'admin.users.update-status' );
    } );
} );