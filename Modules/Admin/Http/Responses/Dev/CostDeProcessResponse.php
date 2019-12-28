<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;


class CostDeProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        $type = $request->type;

        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Cost Journal  is updated');
            }else{
                flash()->success('Success', 'Jurnal Biaya sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Cost Journal is Added');
            }else{
                flash()->success('Success', 'Jurnal Biaya sudah ditambah');
            }
        }
        return redirect('/admin/costde/'.$type);
    }
}