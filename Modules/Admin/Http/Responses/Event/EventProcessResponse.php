<?php
namespace Modules\Admin\Http\Responses\Event;

use Illuminate\Contracts\Support\Responsable;


class EventProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Event  is updated');
            }else{
                flash()->success('Success', 'Jadwal Kegiatan sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Event is Added');
            }else{
                flash()->success('Success', 'Jadwal Kegiatan sudah ditambah');
            }
        }
        return redirect()->route('event');
    }
}