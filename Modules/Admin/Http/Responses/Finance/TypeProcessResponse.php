<?php
namespace Modules\Admin\Http\Responses\Finance;

use Illuminate\Contracts\Support\Responsable;


class TypeProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Type  is updated');
            }else{
                flash()->success('Success', 'Kategory sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Type is Added');
            }else{
                flash()->success('Success', 'Kategory sudah ditambah');
            }
        }
        return redirect()->route('type');
    }
}