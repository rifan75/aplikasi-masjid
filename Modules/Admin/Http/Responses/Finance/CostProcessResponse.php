<?php
namespace Modules\Admin\Http\Responses\Finance;

use Illuminate\Contracts\Support\Responsable;


class CostProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Cost  is updated');
            }else{
                flash()->success('Success', 'Akun Pengeluaran sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Cost is Added');
            }else{
                flash()->success('Success', 'Akun Pengeluaran sudah ditambah');
            }
        }
        return redirect()->route('cost');
    }
}