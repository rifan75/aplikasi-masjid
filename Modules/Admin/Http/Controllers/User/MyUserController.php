<?php

namespace Modules\Admin\Http\Controllers\User;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\User\MyUserIndexResponse;
use Modules\Admin\Http\Responses\User\MyUserProcessResponse;
use Modules\Admin\Http\Requests\User\MyUserRequest;
use Modules\Admin\Http\Repos\User\ProcessMyUserRepoInterface;

class MyUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(MyUserIndexResponse $index)
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

    public function update(MyUserRequest $request, ProcessMyUserRepoInterface $repo, $id)
    {
        $repo->updateMyUserDefault($request, $id);

        if ($request->hasFile('picture')) 
        {
          $user->addMediaFromRequest('picture')->toMediaCollection('picture','s3');
        }

        return new MyUserProcessResponse();
    }

    public function delete($id)
    {
        //
    }
}
