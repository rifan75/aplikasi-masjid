<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Event;
use Modules\Admin\Entities\DetailEvent;
use DataTables;
use Auth;
use DateTime;

class EventIndexResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $detailevent =  DetailEvent::with('event','attachments')->orderBy('id', 'desc')->first();

        if($request->ajax()){
            return $this->DataTable();
        }
       
            return view('frontend::event',compact('datenow','detailevent'));
    }

    public function DataTable()
    {
        $events =  Event::where('status',true)->orderBy('date','DESC')->get();
        
        $no = 0;
        $data = array();
        foreach ($events as $event) {
            $no ++;
            $row = array();
            $row[] = $no;
            $row['id'] = $event->id;
            if($event->detailevent==null){
                $row['content'] = '<a href="/event/tdkada" style="color:black"><b>'.$event->date.'
                <br>'.$event->category.'</b><br><b>Tema : </b>'
                 .$event->title.'</a>';
            }else{
                $row['content'] = '<a href="/event/'.$event->detailevent->slug.'" style="color:black"><b>'.$event->date.'
                <br>'.$event->category.'</b><br><b>Tema : </b>'
                 .$event->title.'</a>';
            }
            
            $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}