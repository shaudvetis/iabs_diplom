<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use DB;
use Carbon\Carbon;

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
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
        switch(Auth::user()->role) {
            case 0:
                return redirect('/students');
                break;
                
            case 1:
                return redirect('/teacher');
                break;
            case 2:
                return redirect('/manager');
                break;
            case 3:
                return redirect('/admin');
                break;
            case 4:
                return redirect('/admink.dashboard');
                break;
            default:
                return redirect('/home');
                break;        
        }
        
    
    }
}
