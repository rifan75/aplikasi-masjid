<?php
namespace Modules\Admin\Http\Responses\Role;

use Illuminate\Contracts\Support\Responsable;


class RoleProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Level  is updated');
            }else{
                flash()->success('Success', 'Peran sudah diupdate');
            }
        }
        return redirect()->route('role');
    }
}