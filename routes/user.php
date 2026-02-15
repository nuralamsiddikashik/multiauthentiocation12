<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware( ['user'] )->group( function () {
    Route::get( '/users/dashboard', [UserController::class, 'dashboard'] )->name( 'user.dashboard' );
} );

Route::controller( UserController::class )->group( function () {
    Route::get( '/users/create', 'create' )->name( 'user.register.create' );
    Route::post( '/users', 'store' )->name( 'user.store' );

    Route::get( '/users/login', 'login' )->name( 'user.login' );
    Route::post( '/user/submit', 'userLoginStore' )->name( 'user.login.store' );
} );