<?php

namespace Modules\Admin\Http\Controllers\Finance;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Finance\CostIndexResponse;
use Modules\Admin\Http\Responses\Finance\CostEditResponse;
use Modules\Admin\Http\Responses\Finance\CostProcessResponse;
use Modules\Admin\Http\Requests\Finance\CostRequest;
use Modules\Admin\Http\Repos\Finance\ProcessCostRepoInterface;

class CostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(CostIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(CostRequest $request, ProcessCostRepoInterface $repo)
    {
        $repo->createCostDefault($request);

        return new CostProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new CostEditResponse($id);
    }

    public function update(CostRequest $request, ProcessCostRepoInterface $repo, $id)
    {
        $repo->updateCostDefault($request, $id);

        return new CostProcessResponse();
    }

    public function delete(ProcessCostRepoInterface $repo, $id)
    {
        $repo->deleteCostDefault($id);
    }
}
