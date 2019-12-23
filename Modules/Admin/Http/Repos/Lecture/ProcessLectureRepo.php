<?php
namespace Modules\Admin\Http\Repos\Lecture;

use Modules\Admin\Http\Repos\Lecture\ProcessLectureRepoInterface;
use Modules\Admin\Entities\Lecture;
use Auth;

class ProcessLectureRepo implements ProcessLectureRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createLectureDefault($lectureData)
    {
        $data = [
            'scholar'  =>   $lectureData->scholar,
            'title'  =>   $lectureData->title,
            'category'   =>   $lectureData->category,
            'type'  =>   $lectureData->type,
            'day'   =>   $lectureData->day,
            'date'  =>   $lectureData->date?$lectureData->date:'01 July 1999',
            'from'   =>   $lectureData->from,
            'untill'    =>   $lectureData->untill,
        ];

        $lecture = Lecture::create($data);
        
        return $lecture;
    }

    public function updateLectureDefault($lectureData, $id)
    { 
        $data = [
            'scholar'  =>   $lectureData->scholar,
            'title'  =>   $lectureData->title,
            'category'   =>   $lectureData->category,
            'type'  =>   $lectureData->type,
            'day'   =>   $lectureData->day,
            'date'  =>   $lectureData->date?$lectureData->date:'01 July 1999',
            'from'   =>   $lectureData->from,
            'untill'    =>   $lectureData->untill,
        ];
        $lecture = Lecture::where('id',$id)->first();
        $lecture->update($data);
        return $lecture;   
    }

    public function deleteLectureDefault($id)
    { 
        $lecture = Lecture::where('id',$id)->first();
        $lecture->delete();
        return $lecture;   
    }
}