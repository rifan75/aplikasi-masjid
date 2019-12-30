<?php
namespace Modules\Admin\Http\Responses\Lecture;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Resume;
use Modules\Admin\Entities\ResumeAgree;
use Auth;

class ResumeShowResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $resume =  Resume::where('slug',$slug)->first();
        $resumeagree =  ResumeAgree::where('resume_id',$resume->id)->where('user_id',Auth::user()->id)->first();
        $resumerandoms = Resume::all()->random(3);
        return view('admin::lecture.resume_show',compact('datenow','resume','resumerandoms','resumeagree'));
    }

}