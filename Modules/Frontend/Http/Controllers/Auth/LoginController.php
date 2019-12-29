<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use Modules\Frontend\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
      
        return view('frontend::auth.login',compact('datenow'));
        
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->active) {
            auth()->logout();
            return back()->with('warning', 'Akun anda belum diaktifasi, harap hubungi pengurus masjid 
            untuk mengaktivasi akun anda,');
        }
        return redirect()->route('home');
    } 
}
