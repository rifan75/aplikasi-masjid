<?php
namespace Modules\Admin\Http\Responses\User;

use Illuminate\Contracts\Support\Responsable;


class MyUserProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'User is updated');
            }else{
                flash()->success('Success', 'User sudah diupdate');
            }
        }
        return redirect()->route('admin');
    }
}