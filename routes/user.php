<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::controller( UserController::class )->group( function () {
    Route::get( '/users/create', 'create' );
    Route::post( '/users', 'store' )->name( 'user.store' );
} );