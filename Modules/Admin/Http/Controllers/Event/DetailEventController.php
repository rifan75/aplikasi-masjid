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
        $resume = $repo->createDetailEventDefault($request);
       
        if ($request->hasFile('img_resume_1')) 
        {
          $resume->addMediaFromRequest('img_resume_1')->toMediaCollection('img_resume_1','s3');
        }

        if ($request->hasFile('img_resume_2')) 
        {
          $resume->addMediaFromRequest('img_resume_2')->toMediaCollection('img_resume_2','s3');
        }

        if ($request->hasFile('img_resume_3')) 
        {
          $resume->addMediaFromRequest('img_resume_3')->toMediaCollection('img_resume_3','s3');
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
        $resume = $repo->updateDetailEventDefault($request, $id);

        if ($request->hasFile('img_resume_1')) 
        {
          $resume->addMediaFromRequest('img_resume_1')->toMediaCollection('img_resume_1','s3');
        }

        if ($request->hasFile('img_resume_2')) 
        {
          $resume->addMediaFromRequest('img_resume_2')->toMediaCollection('img_resume_2','s3');
        }

        if ($request->hasFile('img_resume_3')) 
        {
          $resume->addMediaFromRequest('img_resume_3')->toMediaCollection('img_resume_3','s3');
        }

        return new DetailEventProcessResponse();
    }

    public function delete(ProcessDetailEventRepoInterface $repo, $id)
    {
        $repo->deleteDetailEventDefault($id);
    }
}
