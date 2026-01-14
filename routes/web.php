<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get( '/', [FrontController::class, 'index'] )->name( 'home' );
Route::get( '/about', [FrontController::class, 'about'] )->name( 'about' );
