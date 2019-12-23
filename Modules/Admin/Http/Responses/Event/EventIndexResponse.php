<?php
namespace Modules\Admin\Http\Responses\Event;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Event;
use Modules\Admin\Entities\Category;
use Modules\Admin\Entities\Scholar;
use DataTables;


class EventIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $categories = Category::all();

        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::event.event',compact('categories'));
    }
    public function DataTable()
    {
        $events = Event::orderBy('status', 'desc')->orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($events as $event) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $event->id;
        $row['name'] = $event->name;
        $row['category'] = $event->category;
        $row['title'] = $event->title;
        if($event->status){
            $row['status'] = "<a href='#' onclick='editAct(\"".$event->id."\",\"".$event->status."\")'><i class='fa fa-check' title='edit'></i></a>";
        }else{
            $row['status'] = "<a href='#' onclick='editAct(\"".$event->id."\",\"".$event->status."\")'><i class='fa fa-ban' title='edit'></i></a>";
        }
        $row['date'] =$event->date.'<br>'.$event->from.'  '.__('admin::event.sd').'  '.$event->untill;
        $row['action'] = "<a href='#' onclick='editForm(\"".$event->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$event->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}