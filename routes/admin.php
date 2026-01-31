<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix( 'admin' )->group( function () {

    Route::middleware( 'admin.guest' )->group( function () {
        Route::get( '/login', [AdminController::class, 'login'] )
            ->name( 'admin.login' );

        Route::post( '/login', [AdminController::class, 'admin_login_submit'] )
            ->name( 'admin.login.submit' );
    } );

    Route::middleware( 'admin' )->group( function () {
        Route::get( '/dashboard', [AdminController::class, 'dashboard'] )
            ->name( 'admin.dashboard' );

        Route::post( '/logout', [AdminController::class, 'adminLogout'] )
            ->name( 'admin.logout' );
    } );
} );