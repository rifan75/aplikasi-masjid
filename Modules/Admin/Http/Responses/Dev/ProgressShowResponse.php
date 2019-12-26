<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Progress;

class ProgressShowResponse implements Responsable
{

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $progress =  Progress::with('image')->where('slug',$slug)->first();

        return view('admin::event.progress_show',compact('datenow','progress'));
    }

}