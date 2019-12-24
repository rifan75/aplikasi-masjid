<?php
namespace Modules\Admin\Http\Responses\DetailEvent;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\DetailEvent;

class DetailEventEditResponse implements Responsable
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
        $event = DetailEvent::where('id',$this->id)->first();
        
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