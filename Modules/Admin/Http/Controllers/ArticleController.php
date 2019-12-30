<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Responses\Article\ArticleIndexResponse;
use Modules\Admin\Http\Responses\Article\ArticleCreateResponse;
use Modules\Admin\Http\Responses\Article\ArticleShowResponse;
use Modules\Admin\Http\Responses\Article\ArticleEditResponse;
use Modules\Admin\Http\Responses\Article\ArticleProcessResponse;
use Modules\Admin\Http\Responses\Article\ArticleAgreeProcessResponse;
use Modules\Admin\Http\Requests\ArticleRequest;
use Modules\Admin\Http\Requests\ArticleAgreeRequest;
use Modules\Admin\Http\Repos\ProcessArticleRepoInterface;
use Modules\Admin\Entities\ArticleAgree;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ArticleIndexResponse $response)
    {
        return $response;
    }

    public function create(ArticleCreateResponse $response)
    {
        return $response;
    }

    public function store(ArticleRequest $request, ProcessArticleRepoInterface $repo)
    {
        $article = $repo->createArticleDefault($request);

        if ($request->hasFile('img_article_1')) 
        {
          $article->addMediaFromRequest('img_article_1')->toMediaCollection('article_head','s3');
        }

        return new ArticleProcessResponse();
    }

    public function show(ArticleShowResponse $response)
    {
        return $response;
    }

    public function edit($id)
    {
        return new ArticleEditResponse($id);
    }

    public function update(ArticleRequest $request, ProcessArticleRepoInterface $repo, $id)
    {
        $article = $repo->updateArticleDefault($request, $id);

        if ($request->hasFile('img_article_1')) 
        {
          $article->addMediaFromRequest('img_article_1')->toMediaCollection('article_head','s3');
        }

        return new ArticleProcessResponse();
    }

    public function delete(ProcessArticleRepoInterface $repo, $id)
    {
        $repo->deleteArticleDefault($id);
    }

    public function createagree(ArticleAgreeRequest $request, ProcessArticleRepoInterface $repo)
    {
        $article = $repo->createagreeArticleDefault($request);

        return response()->json();
    }

    public function updateagree(ProcessArticleRepoInterface $repo,$id,$artId)
    {
        $article = $repo->updateagreeArticleDefault($id,$artId);

        return response()->json();
    }
}
