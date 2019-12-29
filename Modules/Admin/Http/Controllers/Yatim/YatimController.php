<?php

namespace Modules\Admin\Http\Controllers\Yatim;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Yatim\YatimIndexResponse;
use Modules\Admin\Http\Responses\Yatim\YatimEditResponse;
use Modules\Admin\Http\Responses\Yatim\YatimProcessResponse;
use Modules\Admin\Http\Requests\Yatim\YatimRequest;
use Modules\Admin\Http\Repos\Yatim\ProcessYatimRepoInterface;

class YatimController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(YatimIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(YatimRequest $request, ProcessYatimRepoInterface $repo)
    {
        $yatim = $repo->createYatimDefault($request);

        if ($request->hasFile('picture')) 
        {
          $yatim->addMediaFromRequest('picture')->toMediaCollection('yatim','s3');
        }

        return new YatimProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new YatimEditResponse($id);
    }

    public function update(YatimRequest $request, ProcessYatimRepoInterface $repo, $id)
    {
        $yatim = $repo->updateYatimDefault($request, $id);

        if ($request->hasFile('picture')) 
        {
          $yatim->addMediaFromRequest('picture')->toMediaCollection('yatim','s3');
        }

        return new YatimProcessResponse();
    }

    public function delete(ProcessYatimRepoInterface $repo, $id)
    {
        $repo->deleteYatimDefault($id);
    }
}
