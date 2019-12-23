<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Responses\Article\ArticleIndexResponse;
use Modules\Admin\Http\Responses\Article\ArticleEditResponse;
use Modules\Admin\Http\Responses\Article\ArticleProcessResponse;
use Modules\Admin\Http\Requests\Article\ArticleRequest;
use Modules\Admin\Http\Repos\Article\ProcessArticleRepoInterface;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ArticleIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(ArticleRequest $request, ProcessArticleRepoInterface $repo)
    {
        $repo->createArticleDefault($request);

        return new ArticleProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new ArticleEditResponse($id);
    }

    public function update(ArticleRequest $request, ProcessArticleRepoInterface $repo, $id)
    {
        $repo->updateArticleDefault($request, $id);

        return new ArticleProcessResponse();
    }

    public function delete(ProcessArticleRepoInterface $repo, $id)
    {
        $repo->deleteArticleDefault($id);
    }
}
