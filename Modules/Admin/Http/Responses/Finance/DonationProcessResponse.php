<?php
namespace Modules\Admin\Http\Responses\Finance;

use Illuminate\Contracts\Support\Responsable;


class DonationProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Donation  is updated');
            }else{
                flash()->success('Success', 'Akun Donasi sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Donation is Added');
            }else{
                flash()->success('Success', 'Akun Donasi sudah ditambah');
            }
        }
        return redirect()->route('donation');
    }
}