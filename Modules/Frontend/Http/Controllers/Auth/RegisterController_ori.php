<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use Modules\Account\Http\Repos\Auth\RegisterCreateRepo;
use Modules\Account\Http\Repos\Payment\PaymentStartRepo;
use Modules\Account\Http\Responses\RegisterIndexResponse;
use Modules\Account\Entities\Company;
use Modules\Account\Entities\VerifyUser;
use Modules\Frontend\Http\Controllers\Controller;
use Modules\Account\Http\Rule\SubDomainRule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm(Request $request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
      
        return view('frontend::auth.register',compact('datenow'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'subdomain' => ['required','unique:company,slug', new SubDomainRule],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $registercreate = new RegisterCreateRepo;
    
        $user = $registercreate->create($data);

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        $paymentrepo = new PaymentStartRepo;

        if($request->bayar_ngak=="choice1" || $request->bayar_ngak=="choice2" || $request->bayar_ngak=="choice3")
        {
            $payment = $paymentrepo->payment($request->bayar_ngak,$user);

            return redirect($payment);
        }
        return redirect('/home-account')->with('status', 'Kami telah kirimkan link aktivasi ke email anda.');
    }

    protected function checksubdomain($subdomain)
    {
        if (!preg_match('/^[A-Za-z0-9](?:[A-Za-z0-9\-]{0,61}[A-Za-z0-9])?$/', $subdomain)) 
        {
            $data = "Subdomain ini tidak bisa dipakai";
                return json_encode($data);
        }
        $slug = self::$subdomains;
        $sub = strtolower($subdomain);
        foreach ($slug as $value)
        {
            if ($value == $sub)
            {
                $data = "Subdomain ini sudah terpakai";
                return json_encode($data);
            }
        }
        $slugdb = Company::all();
        foreach ($slugdb as $value)
        {
            if ($value->slug == $sub)
            {
                $data = "Subdomain ini sudah terpakai";
                return json_encode($data);
            }
        }
        $data = "Subdomain ini bisa dipakai";
        return json_encode($data);
    }

}
