<?php

namespace Modules\Admin\Http\Controllers\Lecture;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Lecture\ResumeIndexResponse;
use Modules\Admin\Http\Responses\Lecture\ResumeCreateResponse;
use Modules\Admin\Http\Responses\Lecture\ResumeEditResponse;
use Modules\Admin\Http\Responses\Lecture\ResumeProcessResponse;
use Modules\Admin\Http\Requests\Lecture\ResumeRequest;
use Modules\Admin\Http\Repos\Lecture\ProcessResumeRepoInterface;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ResumeIndexResponse $index)
    {
        return $index;
    }

    public function create(ResumeCreateResponse $response)
    {
        return $response;
    }

    public function store(ResumeRequest $request, ProcessResumeRepoInterface $repo)
    {
        $repo->createResumeDefault($request);

        return new ResumeProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new ResumeEditResponse($id);
    }

    public function update(ResumeRequest $request, ProcessResumeRepoInterface $repo, $id)
    {
        $repo->updateResumeDefault($request, $id);

        return new ResumeProcessResponse();
    }

    public function delete(ProcessResumeRepoInterface $repo, $id)
    {
        $repo->deleteResumeDefault($id);
    }
}
