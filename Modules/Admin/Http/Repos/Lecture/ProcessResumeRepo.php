<?php
namespace Modules\Admin\Http\Repos\Lecture;

use Modules\Admin\Http\Repos\Lecture\ProcessResumeRepoInterface;
use Modules\Admin\Entities\Resume;
use Modules\Admin\Entities\ResumeAgree;
use Auth;
use Carbon\Carbon;

class ProcessResumeRepo implements ProcessResumeRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createResumeDefault($resumeData)
    {
        $data = [
            'user_id'  =>   Auth::user()->id,
            'scholar'  =>   $resumeData->scholar,
            'lecture_id'   =>   $resumeData->lecture_id,
            'title'  =>   $resumeData->title,
            'video'   =>   $resumeData->video,
            'slug'   =>   $resumeData->slug,
            'date'  =>   $resumeData->date,
            'content'   =>  $resumeData->content,
        ];

        $resume = Resume::create($data);
        
        return $resume;
    }

    public function updateResumeDefault($resumeData, $id)
    { 
        $data = [
            'user_id'  =>   Auth::user()->id,
            'scholar'  =>   $resumeData->scholar,
            'lecture_id'   =>   $resumeData->lecture_id,
            'title'  =>   $resumeData->title,
            'video'   =>   $resumeData->video,
            'slug'   =>   $resumeData->slug,
            'date'  =>   $resumeData->date,
            'content'   =>  $resumeData->content,
            'published' => false,
        ];
        $agreepublish = ResumeAgree::where('resume_id',$id);
        $resume = Resume::where('id',$id)->first();

        $resume->update($data);
        $agreepublish->delete();
        
        return $resume;   
    }

    public function deleteResumeDefault($id)
    { 
        $resume = Resume::where('id',$id)->first();
        $resume->delete();
        return $resume;   
    }

    public function createagreeResumeDefault($resumeData)
    { 
        $data = [
            'user_id'  =>   Auth::user()->id,
            'resume_id'  =>   $resumeData->resume_id,
            'date'  =>   Carbon::now(),
            'agree'   =>   $resumeData->agree,
        ];
   
        ResumeAgree::create($data);

        $agreepublish = ResumeAgree::where('resume_id',$resumeData->resume_id)->where('agree',true)->count();
        $resume = Resume::where('id',$resumeData->resume_id)->first();

        if($agreepublish >= 3)
        {
            $resume->update(['published' => true]);
        }
        else
        {
            $resume->update(['published' =>false]);
        }

        return $resume;
    }

    public function updateagreeResumeDefault($id,$artId)
    { 
        

        $agree = ResumeAgree::where('id',$id)->first();

        if($agree->agree==0){
            $agree->update(['agree' => 1]);
        }else{
            $agree->update(['agree' => 0]);
        }

        $agreepublish = ResumeAgree::where('resume_id',$artId)->where('agree',true)->count();
        $resume = Resume::where('id',$artId)->first();
     
        if($agreepublish >= 3)
        {
            $resume->update(['published' => true]);
        }
        else
        {
            $resume->update(['published' =>false]);
        }

        return $resume;
    }
}