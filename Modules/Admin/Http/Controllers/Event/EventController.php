<?php

namespace Modules\Admin\Http\Controllers\Event;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Event\EventIndexResponse;
use Modules\Admin\Http\Responses\Event\EventEditResponse;
use Modules\Admin\Http\Responses\Event\EventProcessResponse;
use Modules\Admin\Http\Requests\Event\EventRequest;
use Modules\Admin\Http\Repos\Event\ProcessEventRepoInterface;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(EventIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(EventRequest $request, ProcessEventRepoInterface $repo)
    {
        $repo->createEventDefault($request);

        return new EventProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new EventEditResponse($id);
    }

    public function update(EventRequest $request, ProcessEventRepoInterface $repo, $id)
    {
        $repo->updateEventDefault($request, $id);

        return new EventProcessResponse();
    }

    public function delete(ProcessEventRepoInterface $repo, $id)
    {
        $repo->deleteEventDefault($id);
    }
}
