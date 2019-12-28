<?php

namespace Modules\Admin\Http\Controllers\Dev;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Dev\CostDeIndexResponse;
use Modules\Admin\Http\Responses\Dev\CostDeEditResponse;
use Modules\Admin\Http\Responses\Dev\CostDeProcessResponse;
use Modules\Admin\Http\Requests\Dev\CostDeRequest;
use Modules\Admin\Http\Repos\Dev\ProcessCostDeRepoInterface;

class CostDeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(CostDeIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(CostDeRequest $request, ProcessCostDeRepoInterface $repo)
    {
        $repo->createCostDeDefault($request);

        return new CostDeProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new CostDeEditResponse($id);
    }

    public function update(CostDeRequest $request, ProcessCostDeRepoInterface $repo, $id)
    {
        $repo->updateCostDeDefault($request, $id);

        return new CostDeProcessResponse();
    }

    public function delete(ProcessCostDeRepoInterface $repo, $id)
    {
        $repo->deleteCostDeDefault($id);
    }
}
