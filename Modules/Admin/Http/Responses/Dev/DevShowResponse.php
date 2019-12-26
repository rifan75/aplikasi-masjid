<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Dev;

class DevShowResponse implements Responsable
{

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $dev =  Dev::where('slug',$slug)->first();

        return view('admin::dev.dev_show',compact('datenow','dev'));
    }

}