<?php

namespace Modules\Admin\Http\Controllers\Event;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Event\DetailEventIndexResponse;
use Modules\Admin\Http\Responses\Event\DetailEventCreateResponse;
use Modules\Admin\Http\Responses\Event\DetailEventShowResponse;
use Modules\Admin\Http\Responses\Event\DetailEventEditResponse;
use Modules\Admin\Http\Responses\Event\DetailEventProcessResponse;
use Modules\Admin\Http\Requests\Event\DetailEventRequest;
use Modules\Admin\Http\Repos\Event\ProcessDetailEventRepoInterface;

class DetailEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(DetailEventIndexResponse $response)
    {
        return $response;
    }

    public function create(DetailEventCreateResponse $response)
    {
        return $response;
    }

    public function store(DetailEventRequest $request, ProcessDetailEventRepoInterface $repo)
    {
        $detaievent = $repo->createDetailEventDefault($request);
       
        foreach ($request->input('image', []) as $file) {
          $detaievent->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('event','s3');
      }

        return new DetailEventProcessResponse();
    }

    public function show(DetailEventShowResponse $response)
    {
        return $response;
    }

    public function edit($id)
    {
        return new DetailEventEditResponse($id);
    }

    public function update(DetailEventRequest $request, ProcessDetailEventRepoInterface $repo, $id)
    {
        $detailevent = $repo->updateDetailEventDefault($request, $id);

        if (count($detailevent->attachments) > 0) {
            foreach ($detailevent->attachments as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }
    
        $media = $detailevent->attachments->pluck('file_name')->toArray();
    
        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $detailevent->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('event','s3');
            }
        }

        return new DetailEventProcessResponse();
    }

    public function delete(ProcessDetailEventRepoInterface $repo, $id)
    {
        $repo->deleteDetailEventDefault($id);
    }
}
