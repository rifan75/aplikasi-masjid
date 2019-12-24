<?php
namespace Modules\Admin\Http\Repos;

use Modules\Admin\Http\Repos\ProcessArticleRepoInterface;
use Modules\Admin\Entities\Article;
use Auth;

class ProcessArticleRepo implements ProcessArticleRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createArticleDefault($articleData)
    {
        $data = [
            'user_id'  =>   Auth::user()->id,
            'category'  =>   $articleData->category,
            'title'  =>   $articleData->title,
            'slug'   =>   $articleData->slug,
            'content'   =>  $articleData->content,
        ];

        $article = Article::create($data);
        
        return $article;
    }

    public function updateArticleDefault($articleData, $id)
    { 
        $data = [
            'user_id'  =>   Auth::user()->id,
            'category'  =>   $articleData->category,
            'title'  =>   $articleData->title,
            'slug'   =>   $articleData->slug,
            'content'   =>  $articleData->content,
            'published' => false,
        ];
   
        $article = Article::where('id',$id)->first();
        $article->update($data);
        return $article;   
    }

    public function deleteArticleDefault($id)
    { 
        $article = Article::where('id',$id)->first();
        $article->delete();
        return $article;   
    }
}