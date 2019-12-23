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

    // protected function validateLogin(Request $request)
    // {
        
    //     $email= \Modules\User\Entities\User::whereHas('roles', function($q) {
    //                         $q->where('name','Owner');
    //             })->pluck('email');

    //     $request->validate([
    //         $this->username() => [
    //             'required',
    //             Rule::exists('users')->where(function ($query) use ($email) {
    //                 $query->whereIn('email', $email);
    //             }),
    //         ],
    //         'password' => 'required|string',
    //     ]);
    // }

    /* public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'Anda perlu mengkonfirmasi email anda. Kami telah mengirimkan link aktifasi,
            mohon cek email anda kembali.');
        }
        return redirect()->route('home-account');
    } */
}
