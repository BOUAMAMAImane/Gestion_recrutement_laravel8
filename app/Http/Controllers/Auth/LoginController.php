<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *protected $redirectTo = RouteServiceProvider::HOME;
     * @var string
     */
    
     protected function redirectTo()
     {
         $userType = Auth::user()->user_type;
     
         if ($userType == 'recruiter') {
             return route('recruiterdashboard');
         } elseif ($userType == 'candidate') {
             return route('home');
         } else {
             return '/';
         }
     }
     

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
