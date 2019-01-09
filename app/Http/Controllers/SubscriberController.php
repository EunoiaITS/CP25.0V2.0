<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SubscriberController extends Controller
{
    public function __construct() {
		$this->middleware('is_subscriber');
	}

    public function index() {
    	$page_data = [
    		'page_name' => 'dashboard',
    		'page_title' => 'Dashboard'
    	];

    	return view(Auth::user()->role . '/' . $page_data['page_name'], compact('page_data'));
    }
}
