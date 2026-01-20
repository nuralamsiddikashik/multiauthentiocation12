<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get( '/', [FrontController::class, 'index'] )->name( 'home' );
Route::get( '/about', [FrontController::class, 'about'] )->name( 'about' );

/**
 * User Routes
 */

Route::controller( UserController::class )->group( function () {
    Route::get( '/user/login', 'login' )->name( 'user.login' );
} );

/**
 * Admin Routes
 */

Route::controller( AdminController::class )->group( function () {
    Route::get( '/admin/login', 'adminLogin' )->name( 'admin.login' );
    Route::get( '/admin/dashboard', 'dashboard' )->name( 'admin.dashboard' );
} );
