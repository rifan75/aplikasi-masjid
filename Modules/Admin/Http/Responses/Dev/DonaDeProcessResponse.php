<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;


class DonaDeProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        $type = $request->type;

        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Donation Journal  is updated');
            }else{
                flash()->success('Success', 'Jurnal Donasi sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Donation Journal is Added');
            }else{
                flash()->success('Success', 'Jurnal Donasi sudah ditambah');
            }
        }
        return redirect('/admin/donade/'.$type);
    }
}