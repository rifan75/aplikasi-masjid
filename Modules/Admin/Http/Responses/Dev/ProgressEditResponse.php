<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Dev;
use Modules\Admin\Entities\Progress;

class ProgressEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $devs = Dev::where('status',true)->get();
        $progress = Progress::with('image')->where('id',$this->id)->first();

        return view('admin::dev.progress_edit',compact('devs','progress'));
    }
}