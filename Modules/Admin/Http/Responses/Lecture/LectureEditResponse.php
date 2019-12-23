<?php
namespace Modules\Admin\Http\Responses\Lecture;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Lecture;

class LectureEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::lecture.lecture');
    }

    protected function DataTable()
    {
        $lecture = Lecture::where('id',$this->id)->first();
        
        $data = [
            'id' => $lecture->id,
            'scholar' => $lecture->scholar,
            'category' => $lecture->category,
            'title' => $lecture->title,
            'type' => $lecture->type,
            'day' => $lecture->day,
            'date' => $lecture->dateedit,
            'from' => $lecture->from,
            'untill' => $lecture->untill,
        ];
  
        echo json_encode($data);
    }
}