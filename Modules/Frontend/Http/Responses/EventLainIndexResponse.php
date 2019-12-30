<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Event;
use Modules\Admin\Entities\DetailEvent;
use DataTables;
use Auth;
use DateTime;

class EventLainIndexResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $detailevent =  DetailEvent::with('event','attachments')->where('slug',$slug)->first();
       
        return view('frontend::event',compact('datenow','detailevent'));
    }
}