<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Routes
 */
Route::get( '/', [HomeController::class, 'home'] )->name( 'home' );
Route::get( '/registration', [HomeController::class, 'register'] )->name( 'register' );

// Route::controller( LocationController::class )->group( function () {
//     Route::get( '/divisions', 'divisions' );
//     Route::get( '/districts/{division}', 'districts' );
//     Route::get( '/upazilas/{district}', 'upazilas' );
// } );