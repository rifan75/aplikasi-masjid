<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Frontend\Entities\Article;
use Carbon\Carbon;

class ArticleIndexResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $slug = $request->slug;
        $article =  Article::where('slug',$slug)->first();
        $articlerandoms = Article::all()->random(3);


        return view('frontend::article',compact('datenow','article','articlerandoms'));
    }

}