<?php
namespace Modules\Admin\Http\Responses\Article;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\Category;

class ArticleCreateResponse implements Responsable
{

    public function toResponse($request)
    {
        $categories = Category::all();
        return view('admin::article.article_create',compact('categories'));
    }

}