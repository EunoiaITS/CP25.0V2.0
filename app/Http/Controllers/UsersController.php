<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsersController extends Controller
{
    public function login(Request $request) {
    	if(Auth::user()) {
    		$user_role = Auth::user()->role;
    		return redirect('/' . $user_role);
        }

        if($request->isMethod('post')) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            	$user_role = Auth::user()->role;
            	
        		return redirect()
        			->to('/' . $user_role)
        			->with('success-message', 'You have logged in successfully !!!');
            } else {
                return redirect()
                    ->to('/')
                    ->with('error-message', 'Invalid username/password !!!')
                    ->withInput();
            }
        }

        return view('users/login');
    }

    public function logout() {
        Auth::logout();
    	return redirect()
    		->to('/login')
    		->with('success-message', 'You have logged out successfully !!!');
    }
}
