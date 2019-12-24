<?php
namespace Modules\Admin\Http\Repos;

interface ProcessArticleRepoInterface 
{
    public function createArticleDefault($articleData);
    public function updateArticleDefault($articleData, $id);
    public function deleteArticleDefault($id);
}