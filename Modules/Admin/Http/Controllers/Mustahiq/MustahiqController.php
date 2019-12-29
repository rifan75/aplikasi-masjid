<?php

namespace Modules\Admin\Http\Controllers\Mustahiq;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Mustahiq\MustahiqIndexResponse;
use Modules\Admin\Http\Responses\Mustahiq\MustahiqEditResponse;
use Modules\Admin\Http\Responses\Mustahiq\MustahiqProcessResponse;
use Modules\Admin\Http\Requests\Mustahiq\MustahiqRequest;
use Modules\Admin\Http\Repos\Mustahiq\ProcessMustahiqRepoInterface;

class MustahiqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(MustahiqIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(MustahiqRequest $request, ProcessMustahiqRepoInterface $repo)
    {
        $mustahiq = $repo->createMustahiqDefault($request);

        if ($request->hasFile('picture')) 
        {
          $mustahiq->addMediaFromRequest('picture')->toMediaCollection('mustahiq','s3');
        }

        return new MustahiqProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new MustahiqEditResponse($id);
    }

    public function update(MustahiqRequest $request, ProcessMustahiqRepoInterface $repo, $id)
    {
        $mustahiq = $repo->updateMustahiqDefault($request, $id);

        if ($request->hasFile('picture')) 
        {
          $mustahiq->addMediaFromRequest('picture')->toMediaCollection('mustahiq','s3');
        }

        return new MustahiqProcessResponse();
    }

    public function delete(ProcessMustahiqRepoInterface $repo, $id)
    {
        $repo->deleteMustahiqDefault($id);
    }
}
