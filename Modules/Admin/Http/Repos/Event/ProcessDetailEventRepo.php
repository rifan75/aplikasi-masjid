<?php
namespace Modules\Admin\Http\Repos\Event;

use Modules\Admin\Http\Repos\Event\ProcessDetailEventRepoInterface;
use Modules\Admin\Entities\DetailEvent;
use Auth;

class ProcessDetailEventRepo implements ProcessDetailEventRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createDetailEventDefault($detaileventData)
    {
        $data = [
            'event_id'  =>   $detaileventData->event_id,
            'slug'  =>   $detaileventData->slug,
            'note'  =>   $detaileventData->note,
        ];

        $detailevent = DetailEvent::create($data);
        
        return $detailevent;
    }

    public function updateDetailEventDefault($detaileventData, $id)
    { 
        $data = [
            'event_id'  =>   $detaileventData->event_id,
            'slug'  =>   $detaileventData->slug,
            'note'  =>   $detaileventData->note,
        ];
        $detailevent = DetailEvent::where('id',$id)->first();
        $detailevent->update($data);

        return $detailevent;   
    }

    public function deleteDetailEventDefault($id)
    { 
        $detailevent = DetailEvent::where('id',$id)->first();
        $detailevent->delete();
        return $detailevent;   
    }
}