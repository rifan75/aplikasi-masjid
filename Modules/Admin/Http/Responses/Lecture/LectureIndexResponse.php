<?php
namespace Modules\Admin\Http\Responses\Lecture;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Lecture;
use Modules\Admin\Entities\Category;
use Modules\Admin\Entities\Scholar;
use DataTables;


class LectureIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $categories = Category::all();
        $scholars = Scholar::all();

        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::lecture.lecture',compact('categories','scholars'));
    }
    public function DataTable()
    {
        $lectures = Lecture::orderBy('status', 'desc')->orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($lectures as $lecture) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $lecture->id;
        $row['scholar'] = $lecture->scholar;
        $row['category'] = $lecture->category;
        $row['title'] = $lecture->title;
        $row['type'] = $lecture->type;
        if($lecture->statusraw){
            $row['status'] = "<a href='#' onclick='editAct(\"".$lecture->id."\",\"".$lecture->statusraw."\")'><i class='fa fa-check' title='edit'></i></a>";
        }else{
            $row['status'] = "<a href='#' onclick='editAct(\"".$lecture->id."\",\"".$lecture->statusraw."\")'><i class='fa fa-ban' title='edit'></i></a>";
        }
        if ($lecture->type){
            $row['time'] =$lecture->daytrans.'<br>'.$lecture->from.'  '.__('admin::lecture.sd').'  '.$lecture->untill;
        }else{
            $row['time'] =$lecture->date.'<br>'.$lecture->from.'  '.__('admin::lecture.sd').'  '.$lecture->untill;
        }
        $row['action'] = "<a href='#' onclick='editForm(\"".$lecture->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$lecture->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}