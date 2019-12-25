<?php
namespace Modules\Admin\Http\Responses\Event;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\DetailEvent;

class DetailEventShowResponse implements Responsable
{

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $detailevent =  DetailEvent::with('event','attachments')->where('slug',$slug)->first();

        return view('admin::event.detail_event_show',compact('datenow','detailevent'));
    }

}