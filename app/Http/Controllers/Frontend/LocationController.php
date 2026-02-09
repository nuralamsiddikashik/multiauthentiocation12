<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller {

    public function divisions() {
        return Http::get( 'https://bdapis.com/api/v1.2/divisions' )->json();
    }

    public function districts( $division ) {
        return Http::get(
            "https://bdapis.com/api/v1.2/division/{$division}"
        )->json();
    }

    public function upazilas( $district ) {
        return Http::get(
            "https://bdapis.com/api/v1.2/district/{$district}"
        )->json();
    }
}
