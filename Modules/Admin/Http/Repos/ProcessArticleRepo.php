<?php
namespace Modules\Admin\Http\Repos;

use Modules\Admin\Http\Repos\ProcessArticleRepoInterface;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleAgree;
use Carbon\Carbon;
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

    public function createagreeArticleDefault($articleData)
    { 
        $data = [
            'user_id'  =>   Auth::user()->id,
            'article_id'  =>   $articleData->article_id,
            'date'  =>   Carbon::now(),
            'agree'   =>   $articleData->agree,
        ];
   
        ArticleAgree::create($data);

        $agreepublish = ArticleAgree::where('article_id',$articleData->article_id)->where('agree',true)->get()->count();

        if($agreepublish > 3)
        {
            $published = ['published' => true];
        }
        else
        {
            $published = ['published' =>false];
        }

        $article = Article::where('id',$articleData->article_id)->first();
        $article->update($published);

        return $article;
    }

    public function updateagreeArticleDefault($id,$artId)
    { 
        

        $agree = ArticleAgree::where('id',$id)->first();

        if($agree->agree==0){
            $agree->update(['agree' => 1]);
        }else{
            $agree->update(['agree' => 0]);
        }

        $agreepublish = ArticleAgree::where('article_id',$artId)->where('agree',true)->get()->count();

        if($agreepublish > 3)
        {
            $published = ['published' => true];
        }
        else
        {
            $published = ['published' =>false];
        }

        $article = Article::where('id',$artId)->first();
        $article->update($published);

        return $article;
    }
        
    
}