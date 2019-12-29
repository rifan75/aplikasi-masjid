<?php
namespace Modules\Admin\Http\Responses\Article;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleAgree;
use Auth;

class ArticleShowResponse implements Responsable
{

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $article =  Article::where('slug',$slug)->first();
        $articleagree =  ArticleAgree::where('article_id',$article->id)->where('user_id',Auth::user()->id)->first();
        $articlerandoms = Article::all()->random(3);

        return view('admin::article.article_show',compact('datenow','article','articlerandoms','articleagree'));
    }

}