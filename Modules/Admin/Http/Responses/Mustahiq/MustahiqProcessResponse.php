<?php
namespace Modules\Admin\Http\Responses\Mustahiq;

use Illuminate\Contracts\Support\Responsable;


class MustahiqProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Mustahiq  is updated');
            }else{
                flash()->success('Success', 'Mustahiq sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Mustahiq is Added');
            }else{
                flash()->success('Success', 'Mustahiq sudah ditambah');
            }
        }
        return redirect()->route('mustahiq');
    }
}