<?php
namespace Modules\Admin\Http\Responses\Lecture;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Resume;

class ResumeEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $resume = Resume::where('id',$this->id)->first();
     
        return view('admin::lecture.resume_edit',compact('resume'));
    }
}