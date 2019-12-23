<?php
namespace Modules\Admin\Http\Responses\Event;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Event;

class EventEditResponse implements Responsable
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
        return view('admin::event.event');
    }

    protected function DataTable()
    {
        $event = Event::where('id',$this->id)->first();
        
        $data = [
            'id' => $event->id,
            'name' => $event->name,
            'category' => $event->category,
            'title' => $event->title,
            'date' => $event->dateedit,
            'from' => $event->from,
            'untill' => $event->untill,
        ];
  
        echo json_encode($data);
    }
}