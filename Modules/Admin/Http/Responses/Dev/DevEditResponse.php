<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Dev;
use Modules\Admin\Entities\Type;

class DevEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $dev = Dev::where('id',$this->id)->first();
        $types = Type::all();
        return view('admin::dev.dev_edit',compact('dev','types'));
    }
}