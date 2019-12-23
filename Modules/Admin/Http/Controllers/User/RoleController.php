<?php

namespace Modules\Admin\Http\Controllers\User;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Role\RoleIndexResponse;
use Modules\Admin\Http\Responses\Role\RoleEditResponse;
use Modules\Admin\Http\Responses\Role\RoleProcessResponse;
use Modules\Admin\Http\Repos\User\ProcessRoleRepoInterface;
use Modules\Admin\Http\Requests\User\RoleRequest;


class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(RoleIndexResponse $roleindexresponse)
    {
        return $roleindexresponse;
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new RoleEditResponse($id);
    }

    public function update(RoleRequest $request, ProcessRoleRepoInterface $updaterolerepo, $id)
    {
        $updaterolerepo->updateRoleDefault($request, $id);
        return new RoleProcessResponse();
    }

    public function destroy($id)
    {
        //
    }
}
