<?php
namespace Modules\Admin\Http\Responses\Event;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\DetailEvent;
use Modules\Admin\Entities\Event;
use DataTables;


class DetailEventIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $events = Event::where('status',true)->get();

        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::event.detail_event',compact('events'));
    }
    public function DataTable()
    {
        $detailEvents = DetailEvent::with('event')->orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($detailEvents as $detailEvent) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $detailEvent->id;

        $row['name'] = '<b>'.$detailEvent->event->date.' || '.$detailEvent->event->from.' s.d. '.$detailEvent->event->untill.'
                        <br>'.$detailEvent->event->name.'</b><br><b>Tema : </b>'
                        .$detailEvent->event->title;

        $row['preview'] = '<a href="/admin/detailevent/'.$detailEvent->id.'" id="createbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">'.__("admin::event.preview").'</a>';
      
        $row['action'] = "<a href='#' onclick='editForm(\"".$detailEvent->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$detailEvent->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}