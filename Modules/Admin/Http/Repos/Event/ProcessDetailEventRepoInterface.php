<?php
namespace Modules\Admin\Http\Repos\Event;

interface ProcessDetailEventRepoInterface 
{
    public function createDetailEventDefault($detaileventData);
    public function updateDetailEventDefault($detaileventData, $id);
    public function deleteDetailEventDefault($id);
}