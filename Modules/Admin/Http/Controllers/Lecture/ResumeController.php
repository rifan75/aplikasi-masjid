<?php

namespace Modules\Admin\Http\Controllers\Lecture;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Lecture\ResumeIndexResponse;
use Modules\Admin\Http\Responses\Lecture\ResumeCreateResponse;
use Modules\Admin\Http\Responses\Lecture\ResumeShowResponse;
use Modules\Admin\Http\Responses\Lecture\ResumeEditResponse;
use Modules\Admin\Http\Responses\Lecture\ResumeProcessResponse;
use Modules\Admin\Http\Requests\Lecture\ResumeRequest;
use Modules\Admin\Http\Requests\Lecture\ResumeAgreeRequest;
use Modules\Admin\Http\Repos\Lecture\ProcessResumeRepoInterface;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ResumeIndexResponse $response)
    {
        return $response;
    }

    public function create(ResumeCreateResponse $response)
    {
        return $response;
    }

    public function store(ResumeRequest $request, ProcessResumeRepoInterface $repo)
    {
        $resume = $repo->createResumeDefault($request);
       
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

        return new ResumeProcessResponse();
    }

    public function show(ResumeShowResponse $response)
    {
        return $response;
    }

    public function edit($id)
    {
        return new ResumeEditResponse($id);
    }

    public function update(ResumeRequest $request, ProcessResumeRepoInterface $repo, $id)
    {
        $resume = $repo->updateResumeDefault($request, $id);

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

        return new ResumeProcessResponse();
    }

    public function delete(ProcessResumeRepoInterface $repo, $id)
    {
        $repo->deleteResumeDefault($id);
    }

    public function createagree(ResumeAgreeRequest $request,ProcessResumeRepoInterface $repo)
    {
        $resume = $repo->createagreeResumeDefault($request);

        return response()->json();
    }

    public function updateagree(ProcessResumeRepoInterface $repo,$id,$artId)
    {
        $resume = $repo->updateagreeResumeDefault($id,$artId);

        return response()->json();
    }
}
