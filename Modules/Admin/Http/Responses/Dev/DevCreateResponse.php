<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Dev;
use Modules\Admin\Entities\Category;

class DevCreateResponse implements Responsable
{

    public function toResponse($request)
    {
        return view('admin::dev.dev_create');
    }

}