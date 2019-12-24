<?php
namespace Modules\Admin\Http\Responses\Article;

use Illuminate\Contracts\Support\Responsable;


class ArticleProcessResponse implements Responsable
{

    public function toResponse($request)
    {
        if($request->method() == 'PATCH')
        {
            if (config('app.locale')=='en')
            {
                flash()->success('Success', 'Article  is updated');
            }else{
                flash()->success('Success', 'Artikel sudah diupdate');
            }
        }
        elseif($request->method() == 'POST')
        {
            if (config('app.locale')=='en'){
                flash()->success('Success', 'Article is Added');
            }else{
                flash()->success('Success', 'Artikel sudah ditambah');
            }
        }
        return redirect()->route('article-admin');
    }
}