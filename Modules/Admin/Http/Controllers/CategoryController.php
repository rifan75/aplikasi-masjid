<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Responses\Category\CategoryIndexResponse;
use Modules\Admin\Http\Responses\Category\CategoryEditResponse;
use Modules\Admin\Http\Responses\Category\CategoryProcessResponse;
use Modules\Admin\Http\Requests\CategoryRequest;
use Modules\Admin\Http\Repos\ProcessCategoryRepoInterface;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(CategoryIndexResponse $index)
    {
        return $index;
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request, ProcessCategoryRepoInterface $repo)
    {
        $repo->createCategoryDefault($request);

        return new CategoryProcessResponse();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new CategoryEditResponse($id);
    }

    public function update(CategoryRequest $request, ProcessCategoryRepoInterface $repo, $id)
    {
        $repo->updateCategoryDefault($request, $id);

        return new CategoryProcessResponse();
    }

    public function delete(ProcessCategoryRepoInterface $repo, $id)
    {
        $repo->deleteCategoryDefault($id);
    }
}
