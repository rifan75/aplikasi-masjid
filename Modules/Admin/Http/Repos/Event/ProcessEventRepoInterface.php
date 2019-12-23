<?php
namespace Modules\Admin\Http\Repos\Event;

interface ProcessEventRepoInterface 
{
    public function createEventDefault($eventData);
    public function updateEventDefault($eventData, $id);
    public function deleteEventDefault($id);
}