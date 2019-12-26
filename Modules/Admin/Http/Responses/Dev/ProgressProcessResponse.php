<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;


class ProgressProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Progress  is updated');
            }else{
                flash()->success('Success', 'Perkembangan sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Progress is Added');
            }else{
                flash()->success('Success', 'Perkembangan sudah ditambah');
            }
        }
        return redirect()->route('progress-admin');
    }
}