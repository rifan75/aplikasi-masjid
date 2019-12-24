<?php
namespace Modules\Admin\Http\Responses\Article;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\Category;

class ArticleEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $categories = Category::all();

        $article = Article::where('id',$this->id)->first();
     
        return view('admin::article.article_edit',compact('article','categories'));
    }
}