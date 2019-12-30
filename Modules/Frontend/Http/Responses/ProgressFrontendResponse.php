<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Progress;
use Modules\Admin\Entities\Dev;
use DataTables;

class ProgressFrontendResponse implements Responsable
{
    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $dev = Dev::where('slug',$slug)->first();
        $progresses =  Progress::with('image')->where('dev_id',$dev->id)->orderBy('date','desc')->get();
        $date = $request->date;
        if($request->ajax()){
            return $this->DataTable($date,$slug,$dev);
        }
        return view('frontend::dev.progressfront_show',compact('datenow','progresses','dev'));
    }

    public function DataTable($date,$slug,$dev)
    {
        $progresss =  Progress::with('image')->where('dev_id',$dev->id)->where('date',$date)->first();
      
        $data = [
            'id' => $progresss->id,
            'date' => $progresss->date,
            'description' => $progresss->description,
            'image' => $progresss->image,
        ];

        echo json_encode($data);
    }
}