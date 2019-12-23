<?php
namespace Modules\Admin\Http\Responses\Mosque;

use Illuminate\Contracts\Support\Responsable;


class MosqueProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Mosque List  is updated');
            }else{
                flash()->success('Success', 'Data Masjid sudah diupdate');
            }
        }
        return redirect()->route('mosque-admin');
    }
}