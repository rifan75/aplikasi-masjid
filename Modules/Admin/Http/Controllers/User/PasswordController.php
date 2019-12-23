<?php
namespace Modules\Admin\Http\Controllers\User;

use Modules\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Modules\Admin\Entities\User;
use Auth;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'password' => 'required|min:8|confirmed',
            'oldpassword' => 'required|oldpassword:' . Auth::user()->password
        ]);
       
        User::where('id',$id)->update(['password'=>bcrypt($request->password)]);
        
        if (config('app.locale')=='en')
        {
            flash()->success('Success', 'Password is changed');
        }else{
            flash()->success('Success', 'Password sudah diubah');
        }
        return back();
    }
}
