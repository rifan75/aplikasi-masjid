<?php

namespace Modules\User\Http\Controllers;

use Modules\User\Http\Response\ActivateResponse;
use Modules\User\Entities\User;

class ActivateController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth','admin']);
    }

    public function updateuser(User $model, $uuid, $act)
    {
      return new ActivateResponse($model, $uuid, $act);
      return redirect('user');
    }
}
