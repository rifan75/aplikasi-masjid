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
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::lecture.resume');
    }

    protected function DataTable()
    {
        $resume = Resume::where('id',$this->id)->first();
        
        $data = [
            'id' => $resume->id,
            'scholar' => $resume->scholar,
            'category' => $resume->category,
            'title' => $resume->title,
            'type' => $resume->type,
            'day' => $resume->day,
            'date' => $resume->dateedit,
            'from' => $resume->from,
            'untill' => $resume->untill,
        ];
  
        echo json_encode($data);
    }
}