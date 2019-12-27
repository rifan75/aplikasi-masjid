<?php

namespace Modules\Admin\Http\Controllers\Dev;

use Modules\Admin\Http\Responses\Dev\DonaDeIndexResponse;
use Modules\Admin\Http\Responses\Dev\DonaDeEditResponse;
use Modules\Admin\Http\Responses\Dev\DonaDeProcessResponse;
use Modules\Admin\Http\Requests\Dev\DonaDeRequest;
use Modules\Admin\Http\Repos\Dev\ProcessDonaDeRepoInterface;

class DonaDeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(DonaDeIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(DonaDeRequest $request, ProcessDonaDeRepoInterface $repo)
    {
        $repo->createDonaDeDefault($request);

        return new DonaDeProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new DonaDeEditResponse($id);
    }

    public function update(DonaDeRequest $request, ProcessDonaDeRepoInterface $repo, $id)
    {
        $repo->updateDonaDeDefault($request, $id);

        return new DonaDeProcessResponse();
    }

    public function delete(ProcessDonaDeRepoInterface $repo, $id)
    {
        $repo->deleteDonaDeDefault($id);
    }
}
