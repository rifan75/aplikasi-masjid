<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Dev;
use Modules\Admin\Entities\Category;

class ProgressCreateResponse implements Responsable
{

    public function toResponse($request)
    {
        $devs = Dev::where('status',true)->get();
        return view('admin::dev.progress_create',compact('devs'));
    }

}