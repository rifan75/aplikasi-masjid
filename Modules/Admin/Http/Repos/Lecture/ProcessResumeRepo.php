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
            'scholar'  =>   $resumeData->scholar,
            'title'  =>   $resumeData->title,
            'category'   =>   $resumeData->category,
            'type'  =>   $resumeData->type,
            'day'   =>   $resumeData->day,
            'date'  =>   $resumeData->date?$resumeData->date:'01 July 1999',
            'from'   =>   $resumeData->from,
            'untill'    =>   $resumeData->untill,
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