<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Responses\ActivateResponse;
use Modules\Admin\Http\Responses\StatusResponse;
use Modules\Admin\Entities\User;
use Modules\Admin\Entities\Event;

class ActivateController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth']);
    }

    public function updateuser(User $model, $id, $act)
    {
      return new ActivateResponse($model, $id, $act);
      return redirect()->route('user');
    }

    public function updateevent(Event $model, $id, $act)
    {
      return new StatusResponse($model, $id, $act);
      return redirect()->route('event');
    }
}
