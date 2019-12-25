<?php
namespace Modules\Admin\Http\Responses\Event;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Event;
use Modules\Admin\Entities\DetailEvent;

class DetailEventEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $events = Event::where('status',true)->get();
        $detailevent = DetailEvent::with('attachments')->where('id',$this->id)->first();

        return view('admin::event.detail_event_edit',compact('events','detailevent'));
    }
}