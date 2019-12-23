<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Responses\Scholar\ScholarIndexResponse;
use Modules\Admin\Http\Responses\Scholar\ScholarEditResponse;
use Modules\Admin\Http\Responses\Scholar\ScholarProcessResponse;
use Modules\Admin\Http\Requests\ScholarRequest;
use Modules\Admin\Http\Repos\ProcessScholarRepoInterface;

class ScholarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ScholarIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(ScholarRequest $request, ProcessScholarRepoInterface $repo)
    {
        $scholar = $repo->createScholarDefault($request);

        if ($request->hasFile('picture')) 
        {
          $scholar->addMediaFromRequest('scholar')->toMediaCollection('scholar','s3');
        }

        return new ScholarProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new ScholarEditResponse($id);
    }

    public function update(ScholarRequest $request, ProcessScholarRepoInterface $repo, $id)
    {
        $scholar = $repo->updateScholarDefault($request, $id);

        if ($request->hasFile('picture')) 
        {
          $scholar->addMediaFromRequest('scholar')->toMediaCollection('scholar','s3');
        }

        return new ScholarProcessResponse();
    }

    public function delete(ProcessScholarRepoInterface $repo, $id)
    {
        $repo->deleteScholarDefault($id);
    }
}
