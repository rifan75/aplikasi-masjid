<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Frontend\Entities\Resume;

class ResumeIndexResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $resume =  Resume::where('slug',$slug)->first();
        $resumerandoms = Resume::all()->random(3);
        return view('frontend::resume',compact('datenow','resume','resumerandoms'));
    }

}