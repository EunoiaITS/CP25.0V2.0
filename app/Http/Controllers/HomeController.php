<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Event;
use App\Content;
use App\Keyword;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function about_us() {
        return view('frontend/about_us');
    }

    public function permission() {
        return view('frontend/permission');
    }

    public function team() {
        return view('frontend/team');
    }

    public function privacy_policy() {
        return view('frontend/privacy_policy');
    }

    public function contact() {
        return view('frontend/contact');
    }

    public function subscription() {
        return view('frontend/subscription');
    }

    public function company_registration() {
        if(!Auth::user() || Auth::user()->role != 'subscriber')
            return redirect('/user-register');

        return view('frontend/company_registration');
    }

    public function refund_policy() {
        if(!Auth::user() || Auth::user()->role != 'subscriber')
            return redirect('/user-register');
        
        return view('frontend/refund_policy');
    }

    public function forums() {
        if(!Auth::user() || Auth::user()->role != 'subscriber')
            return redirect('/user-register');
        
        return view('frontend/forums');
    }

    public function events() {
        if(!Auth::user() || Auth::user()->role != 'subscriber')
            return redirect('/user-register');
        
        return view('frontend/events');
    }

    public function event_detail($id) {
        if(!Auth::user() || Auth::user()->role != 'subscriber')
            return redirect('/user-register');
        
        return view('frontend/event_detail', [
            'event_detail' => Event::findOrFail($id)
        ]);
    }

    public function register(Request $request) {
        if(Auth::user() && Auth::user()->role == 'subscriber') {
            return redirect('/subscription');
        }

        if($request->isMethod('post')) {
            $user = new User;
            Validator::make($request->all(), $user->rules)->validate();

            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->password     = Hash::make($request->password);
            $user->role         = $request->role;

            if($user->save()) {
                return redirect()
                    ->to('/user-register')
                    ->with('success', 'You have registered successfully! Please log in to continue.');
            } else {
                return redirect()
                    ->to('/user-register')
                    ->with('error', 'Something went wrong!');
            }
        }

        return view('frontend/register');
    }

    public function login(Request $request) {
        if($request->isMethod('post')) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => $request->role])) {
                
                return redirect()
                    ->to('/subscription')
                    ->with('success', 'You have logged in successfully !!! Please make payment to continue.');
            } else {
                return redirect()
                    ->to('/user-register')
                    ->with('error-message', 'Invalid username/password !!!');
            }
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()
            ->to('/')
            ->with('success', 'You have logged out successfully !!!');
    }

    public function search(Request $request) {
        if(!Auth::user() || Auth::user()->role != 'subscriber')
            return redirect('/user-register');

        if($request->isMethod('post')) {
            $food = Content::where('type', 'food')
                ->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('trans_arabic', 'like', '%' . $request->search . '%')
                ->orWhere('trans_eng', 'like', '%' . $request->search . '%')
                ->orWhere('trans_malay', 'like', '%' . $request->search . '%')->first();

            $keyword = Keyword::where('name', $request->search)->first();

            if($keyword) {
                $quran_links        = $keyword->links()->where('content_type', 'quran')->get();
                $hadith_links       = $keyword->links()->where('content_type', 'hadith')->get();
                $manuscript_links   = $keyword->links()->where('content_type', 'manuscript')->get();
                $article_links      = $keyword->links()->where('content_type', 'article')->get();
            } else {
                $quran_links        = [];
                $hadith_links       = [];
                $manuscript_links   = [];
                $article_links      = [];
            }

            return view('frontend/results', [
                'search'            => $request->search,
                'food'              => $food,
                'quran_links'       => $quran_links,
                'hadith_links'      => $hadith_links,
                'manuscript_links'  => $manuscript_links,
                'article_links'     => $article_links
            ]);
        }
    }
}
