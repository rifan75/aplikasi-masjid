<?php
namespace Modules\Admin\Http\Responses\Mosque;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Mosque;

class MosqueIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $mosque = Mosque::all()->first();
        return view('admin::mosque',compact('mosque'));
    }
}