<?php

namespace Modules\Account\Http\Controllers\Auth;

use Modules\Account\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('account::auth.passwords.email');
    }

    protected function validateEmail(Request $request)
    {
        $email= \Modules\User\Entities\User::whereHas('roles', function($q) {
            $q->where('name','Owner');
        })->pluck('email');
        
        $request->validate(['email' => ['required','email',
            Rule::exists('users')->where(function ($query) use ($email) {
                $query->whereIn('email', $email);
            })]
        ]);
    }
}
