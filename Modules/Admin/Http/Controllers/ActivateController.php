<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Responses\ActivateResponse;
use Modules\Admin\Http\Responses\StatusResponse;
use Modules\Admin\Entities\User;
use Modules\Admin\Entities\Event;
use Modules\Admin\Entities\Lecture;
use Modules\Admin\Entities\Yatim;
use Modules\Admin\Entities\Mustahiq;
use Modules\Admin\Entities\Dev;

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

    public function updatelecture(Lecture $model, $id, $act)
    {
      return new StatusResponse($model, $id, $act);
      return redirect()->route('event');
    }

    public function updatemustahiq(Mustahiq $model, $id, $act)
    {
      return new StatusResponse($model, $id, $act);
      return redirect()->route('mustahiq');
    }

    public function updateyatim(Yatim $model, $id, $act)
    {
      return new StatusResponse($model, $id, $act);
      return redirect()->route('yatim');
    }

    public function updatedev(Dev $model, $id, $act)
    {
      return new StatusResponse($model, $id, $act);
      return redirect()->route('development-admin');
    }
}
