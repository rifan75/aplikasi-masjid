<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Modules\User\Entities\User;
use Auth;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request,$uuid)
    {
        $this->validate($request, [
            'password' => 'required|min:8|confirmed',
            'oldpassword' => 'required|oldpassword:' . Auth::user()->password
        ]);
       
        User::whereUuid($uuid)->update(['password'=>bcrypt($request->password)]);
        
        if (config('app.locale')=='en')
        {
            flash()->success('Success', 'Password is changed');
        }else{
            flash()->success('Success', 'Password sudah diubah');
        }
        return back();
    }
}
