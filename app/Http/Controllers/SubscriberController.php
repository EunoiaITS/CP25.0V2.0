<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function __construct() {
		$this->middleware('is_subscriber');
	}

    public function index() {
    	return view('subscriber/dashboard');
    }
}
