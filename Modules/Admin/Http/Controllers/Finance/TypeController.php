<?php

namespace Modules\Admin\Http\Controllers\Finance;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Finance\TypeIndexResponse;
use Modules\Admin\Http\Responses\Finance\TypeEditResponse;
use Modules\Admin\Http\Responses\Finance\TypeProcessResponse;
use Modules\Admin\Http\Requests\Finance\TypeRequest;
use Modules\Admin\Http\Repos\Finance\ProcessTypeRepoInterface;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(TypeIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(TypeRequest $request, ProcessTypeRepoInterface $repo)
    {
        $repo->createTypeDefault($request);

        return new TypeProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new TypeEditResponse($id);
    }

    public function update(TypeRequest $request, ProcessTypeRepoInterface $repo, $id)
    {
        $repo->updateTypeDefault($request, $id);

        return new TypeProcessResponse();
    }

    public function delete(ProcessTypeRepoInterface $repo, $id)
    {
        $repo->deleteTypeDefault($id);
    }
}
