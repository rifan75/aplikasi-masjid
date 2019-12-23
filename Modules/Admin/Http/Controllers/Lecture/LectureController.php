<?php

namespace Modules\Admin\Http\Controllers\Lecture;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Lecture\LectureIndexResponse;
use Modules\Admin\Http\Responses\Lecture\LectureEditResponse;
use Modules\Admin\Http\Responses\Lecture\LectureProcessResponse;
use Modules\Admin\Http\Requests\Lecture\LectureRequest;
use Modules\Admin\Http\Repos\Lecture\ProcessLectureRepoInterface;

class LectureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(LectureIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(LectureRequest $request, ProcessLectureRepoInterface $repo)
    {
        $repo->createLectureDefault($request);

        return new LectureProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new LectureEditResponse($id);
    }

    public function update(LectureRequest $request, ProcessLectureRepoInterface $repo, $id)
    {
        $repo->updateLectureDefault($request, $id);

        return new LectureProcessResponse();
    }

    public function delete(ProcessLectureRepoInterface $repo, $id)
    {
        $repo->deleteLectureDefault($id);
    }
}
