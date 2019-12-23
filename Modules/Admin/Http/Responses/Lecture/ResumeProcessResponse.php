<?php
namespace Modules\Admin\Http\Responses\Lecture;

use Illuminate\Contracts\Support\Responsable;


class ResumeProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Resume  is updated');
            }else{
                flash()->success('Success', 'Kajian sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Resume is Added');
            }else{
                flash()->success('Success', 'Kajian sudah ditambah');
            }
        }
        return redirect()->route('resume-admin');
    }
}