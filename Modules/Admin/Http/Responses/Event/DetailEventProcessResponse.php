<?php
namespace Modules\Admin\Http\Responses\Event;

use Illuminate\Contracts\Support\Responsable;


class DetailEventProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Detail event  is updated');
            }else{
                flash()->success('Success', 'Kegiatan sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Detail event is Added');
            }else{
                flash()->success('Success', 'Kegiatan sudah ditambah');
            }
        }
        return redirect()->route('detailevent-admin');
    }
}