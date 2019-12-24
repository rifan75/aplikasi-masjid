<?php
namespace Modules\Admin\Http\Responses\Article;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Article;

class ArticleShowResponse implements Responsable
{

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $article =  Article::where('slug',$slug)->first();
        $articlerandoms = Article::all()->random(3);

        return view('admin::article.article_show',compact('datenow','article','articlerandoms'));
    }

}