<?php
namespace Modules\Admin\Http\Responses\Lecture;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Resume;

class ResumeShowResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $resume =  Resume::where('slug',$slug)->first();
        $resumerandoms = Resume::all()->random(3);
        return view('admin::lecture.resume_show',compact('datenow','resume','resumerandoms'));
    }

}