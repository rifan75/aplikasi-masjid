<?php
namespace Modules\Admin\Http\Responses\Category;

use Illuminate\Contracts\Support\Responsable;


class CategoryProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Category  is updated');
            }else{
                flash()->success('Success', 'Kategory sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Category is Added');
            }else{
                flash()->success('Success', 'Kategory sudah ditambah');
            }
        }
        return redirect()->route('category');
    }
}