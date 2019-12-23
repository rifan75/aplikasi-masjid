<?php

namespace Modules\Admin\Http\Controllers\User;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Requests\User\UserRequest;
use Modules\Admin\Http\Repos\User\ProcessUserRepoInterface;
use Modules\Admin\Http\Responses\User\UserIndexResponse;
use Modules\Admin\Http\Responses\User\UserEditResponse;
use Modules\Admin\Http\Responses\User\UserProcessResponse;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(UserIndexResponse $userindexresponse)
    {
        return $userindexresponse;
    }

    public function edit($id)
    {
        return new UserEditResponse($id);
    }

    public function update(UserRequest $request, ProcessUserRepoInterface $userRepo, $id)
    {
        $user = $userRepo->updateUserDefault($request, $id);

        if ($request->hasFile('picture')) 
        {
          $user->addMediaFromRequest('picture')->toMediaCollection('picture','s3');
        }

        return new UserProcessResponse();
    }

    public function delete(ProcessUserRepoInterface $userRepo, $id)
    {
        $userRepo->deleteUserDefault($id);
        return new UserProcessResponse();
    }
}
