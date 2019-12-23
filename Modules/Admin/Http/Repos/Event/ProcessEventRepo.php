<?php
namespace Modules\Admin\Http\Repos\Event;

use Modules\Admin\Http\Repos\Event\ProcessEventRepoInterface;
use Modules\Admin\Entities\Event;
use Auth;

class ProcessEventRepo implements ProcessEventRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createEventDefault($eventData)
    {
        $data = [
            'name'  =>   $eventData->name,
            'title'  =>   $eventData->title,
            'category'   =>   $eventData->category,
            'date'  =>   $eventData->date?$eventData->date:'01 July 1999',
            'from'   =>   $eventData->from,
            'untill'    =>   $eventData->untill,
        ];

        $event = Event::create($data);
        
        return $event;
    }

    public function updateEventDefault($eventData, $id)
    { 
        $data = [
            'name'  =>   $eventData->name,
            'title'  =>   $eventData->title,
            'category'   =>   $eventData->category,
            'date'  =>   $eventData->date?$eventData->date:'01 July 1999',
            'from'   =>   $eventData->from,
            'untill'    =>   $eventData->untill,
        ];
        $event = Event::where('id',$id)->first();
        $event->update($data);
        return $event;   
    }

    public function deleteEventDefault($id)
    { 
        $event = Event::where('id',$id)->first();
        $event->delete();
        return $event;   
    }
}