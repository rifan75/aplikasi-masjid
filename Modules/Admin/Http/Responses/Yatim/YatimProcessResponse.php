<?php
namespace Modules\Admin\Http\Responses\Yatim;

use Illuminate\Contracts\Support\Responsable;


class YatimProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Yatim List  is updated');
            }else{
                flash()->success('Success', 'Daftar Yatim sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Yatim List is Added');
            }else{
                flash()->success('Success', 'Daftar Yatim sudah ditambah');
            }
        }
        return redirect()->route('yatim');
    }
}