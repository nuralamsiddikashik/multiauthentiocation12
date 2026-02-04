<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Routes
 */
Route::get( '/', [HomeController::class, 'home'] )->name( 'home' );

Route::get( '/test-bdapi', function () {

    $res = Http::withHeaders( [
        'X-RapidAPI-Key'  => config( 'services.bdapi.key' ),
        'X-RapidAPI-Host' => config( 'services.bdapi.host' ),
    ] )->get( 'https://bdapis.com/api/v1.2/division/rangpur' );

    return $res->json();
} );