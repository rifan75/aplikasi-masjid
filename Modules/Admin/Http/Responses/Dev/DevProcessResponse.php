<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;


class DevProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Development  is updated');
            }else{
                flash()->success('Success', 'Pembangunan sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Development is Added');
            }else{
                flash()->success('Success', 'Pembangunan sudah ditambah');
            }
        }
        return redirect()->route('development-admin');
    }
}