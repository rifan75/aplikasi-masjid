<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Frontend\Entities\Lecture;
use Modules\Frontend\Entities\Resume;
use DataTables;
use Auth;
use DateTime;

class ShortResumeIndexResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $id = $request->id;
        if($request->ajax()){
            return $this->DataTable($id);
        }
       
            return view('frontend::shortresume',compact('datenow'));
    }

    public function DataTable($id)
    {
        if ($id==0){
            $resumes =  Resume::where('published',true)->orderBy('date','DESC')->get();
        }else{
            $resumes =  Resume::where('published',true)->where('lecture_id',$id)->orderBy('date','DESC')->get();
        }
        
        $no = 0;
        $data = array();
        foreach ($resumes as $resume) {
            $no ++;
            $row = array();
            $row['no'] = $no;
            $row['content'] = '<a href="/resume/'.$resume->slug.'" style="color:black"><b>'.$resume->date.' || '.$resume->hijr.'
                               <br><b>Ustadz : </b>'.$resume->scholar.'</b><br><b>Tema : </b>'
                                .$resume->title.'<br><b>Resume Kajian :</b><br>'.$resume->short_content.'</a>';
            $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}