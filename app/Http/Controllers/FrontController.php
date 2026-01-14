<?php

namespace App\Http\Controllers;

class FrontController extends Controller {
    public function index() {
        return view( 'frontend.home' );
    }

    public function about() {
        return view( 'frontend.about' );
    }
}
