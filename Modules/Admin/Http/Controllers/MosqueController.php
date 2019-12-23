<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Responses\Mosque\MosqueIndexResponse;
use Modules\Admin\Http\Responses\Mosque\MosqueProcessResponse;
use Modules\Admin\Http\Requests\MosqueRequest;
use Modules\Admin\Http\Repos\ProcessMosqueRepoInterface;

class MosqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(MosqueIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(MosqueRequest $request, ProcessMosqueRepoInterface $repo, $id)
    {
        $repo->updateMosqueDefault($request, $id);

        return new MosqueProcessResponse();
    }

    public function delete($id)
    {
        //
    }
}
