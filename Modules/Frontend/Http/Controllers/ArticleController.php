<?php

namespace Modules\Frontend\Http\Controllers;

use Modules\Frontend\Http\Responses\ShortArticleIndexResponse;
use Modules\Frontend\Http\Responses\ArticleIndexResponse;
use Modules\Frontend\Entities\Article;

class ArticleController extends Controller
{
    public function index()
    {
      $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
      $archive = Article::orderBy('created_at', 'desc')
        ->whereNotNull('created_at')
        ->get()
        ->groupBy(function(Article $article) {
            return $article->created_at->format('Y');
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('created_at')
                ->groupBy( function ( $item ) {
                    return $item->created_at->format('F');
                });
        });
      return view('frontend::shortarticle',compact('datenow','archive')); 
    }

    public function showshortarticle(ShortArticleIndexResponse $response)
    {
      return $response; 
    }

    public function article(ArticleIndexResponse $response)
    {
      return $response;
    }
}
