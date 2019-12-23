<?php
namespace Modules\Admin\Http\Responses\Lecture;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Lecture;
use DataTables;

class ResumeCreateResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::lecture.resume_create');
    }

    public function DataTable()
    {
        $lectures =  Lecture::all()->sortByDesc('type')->sortBy('status');
        
        $no = 0;
        $data = array();
        foreach ($lectures as $lecture) {
         //   dd($lecture->category->name);
        $no ++;
        $row = array();
        $row['no'] = $no;
        $row['id'] = $lecture->id;
        $row['scholar'] = $lecture->scholar;
        if ($lecture->type)
        {
            $row['move'] = $lecture->scholar.' - '.$lecture->day.', '.$lecture->from.' s.d '.$lecture->untill;
            $row['content'] = '<a href="#" id="clickresumerow" style="color:black"><b>'.$lecture->scholar.' || '.$lecture->category.'</b><br>
                            Kajian Rutin Setiap :<br><b>'.$lecture->day.', '.$lecture->from.' s.d '.$lecture->untill.'</b><br>
                            Status : '.$lecture->status.'</a>';
        }
        else
        {
            $row['move'] = $lecture->scholar.' - '.$lecture->date.', '.$lecture->from.' s.d '.$lecture->untill;
            $row['content'] = '<a href="#" id="clickresumerow" style="color:black"><b>'.$lecture->scholar.' || '.$lecture->category.'</b><br>Tema :<br><b>'.$lecture->title.
                            '</b><br>Jadwal Kajian :<br><b>'.$lecture->date.' || '.$lecture->hijr.' Jam : '.$lecture->from.' s.d '.$lecture->untill.'</b></a>';
        }
        $row['klik'] = "<button class='btn btn-primary btn-xs' type='button' id='clicktabel'>
                    <span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span></button>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}