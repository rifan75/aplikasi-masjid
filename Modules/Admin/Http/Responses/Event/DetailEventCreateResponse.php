<?php
namespace Modules\Admin\Http\Responses\Event;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Event;
use Modules\Admin\Entities\Category;

class DetailEventCreateResponse implements Responsable
{

    public function toResponse($request)
    {
        $events = Event::where('status',true)->get();
        return view('admin::event.detail_event_create',compact('events'));
    }

}