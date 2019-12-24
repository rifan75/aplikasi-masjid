<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Resume;

class ResumeIndexResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $resume =  Resume::where('slug',$slug)->where('published',true)->first();
        $resumerandoms = Resume::where('published',true)->get()->random(3);
        return view('frontend::resume',compact('datenow','resume','resumerandoms'));
    }

}