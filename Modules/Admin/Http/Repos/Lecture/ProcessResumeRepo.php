<?php
namespace Modules\Admin\Http\Repos\Lecture;

use Modules\Admin\Http\Repos\Lecture\ProcessResumeRepoInterface;
use Modules\Admin\Entities\Resume;
use Auth;

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
   
        $resume = Resume::where('id',$id)->first();
        $resume->update($data);
        return $resume;   
    }

    public function deleteResumeDefault($id)
    { 
        $resume = Resume::where('id',$id)->first();
        $resume->delete();
        return $resume;   
    }
}