<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Frontend\Entities\Lecture;
use Modules\Frontend\Entities\Scholar;
use DataTables;
use Auth;

class LectureIndexResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        if($request->ajax()){
            return $this->DataTable();
        }
            return view('frontend::shortresume',compact('datenow'));
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
        if ($lecture->type)
        {
            $row['lecture'] = '<a href="#" id="clickresumerow" style="color:black"><b>'.$lecture->scholar.' || '.$lecture->category.'</b><br>
                            Kajian Rutin Setiap :<br><b>'.$lecture->day.', '.$lecture->from.' s.d '.$lecture->untill.'</b><br>
                            Status : '.$lecture->status.'</a>';
        }
        else
        {
            $row['lecture'] = '<a href="#" id="clickresumerow" style="color:black"><b>'.$lecture->scholar.' || '.$lecture->category.'</b><br>Tema :<br><b>'.$lecture->title.
                            '</b><br>Jadwal Kajian :<br><b>'.$lecture->date.' || '.$lecture->hijr.' Jam : '.$lecture->from.' s.d '.$lecture->untill.'</b></a>';
        }
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}