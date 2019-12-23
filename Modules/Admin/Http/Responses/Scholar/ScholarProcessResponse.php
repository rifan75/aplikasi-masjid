<?php
namespace Modules\Admin\Http\Responses\Scholar;

use Illuminate\Contracts\Support\Responsable;


class ScholarProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Scholar  is updated');
            }else{
                flash()->success('Success', 'Ustadz/ Ulama sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Scholar is Added');
            }else{
                flash()->success('Success', 'Ustadz/ Ulama sudah ditambah');
            }
        }
        return redirect()->route('scholar');
    }
}