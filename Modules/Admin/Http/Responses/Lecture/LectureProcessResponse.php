<?php
namespace Modules\Admin\Http\Responses\Lecture;

use Illuminate\Contracts\Support\Responsable;


class LectureProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Lecture  is updated');
            }else{
                flash()->success('Success', 'Jadwal Kajian sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Lecture is Added');
            }else{
                flash()->success('Success', 'Jadwal Kajian sudah ditambah');
            }
        }
        return redirect()->route('lecture');
    }
}