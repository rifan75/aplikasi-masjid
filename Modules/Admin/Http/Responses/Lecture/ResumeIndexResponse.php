<?php
namespace Modules\Admin\Http\Responses\Lecture;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Resume;
use Modules\Admin\Entities\Lecture;
use DataTables;


class ResumeIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $lectures = Lecture::where('status',true);

        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::lecture.resume',compact('lectures'));
    }
    public function DataTable()
    {
        $resumes = Resume::orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($resumes as $resume) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $resume->id;
        $row['writer'] = $resume->user->name;
        $row['scholar'] = $resume->scholar;
        $row['title'] = $resume->title;
        $row['date'] = $resume->date;
        $row['published'] = $resume->published;
        $row['video'] = $resume->video?$resume->video:'Tidak Ada';
        $row['slug'] = $resume->slug;
        if($resume->published){
            $row['published'] = "<a href='#' onclick='editAct(\"".$resume->id."\",\"".$resume->published."\")'><i class='fa fa-check' title='edit'></i></a>";
        }else{
            $row['published'] = "<a href='#' onclick='editAct(\"".$resume->id."\",\"".$resume->published."\")'><i class='fa fa-ban' title='edit'></i></a>";
        }
        $row['preview'] = '<a href="/admin/article/'.$resume->slug.'" id="createbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">'.__("admin::resume.preview").'</a>';
        $row['action'] = "<a href='#' onclick='editForm(\"".$resume->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$resume->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}