<?php
namespace Modules\Admin\Http\Repos;

interface ProcessCategoryRepoInterface 
{
    public function createCategoryDefault($categoryData);
    public function updateCategoryDefault($categoryData, $id);
    public function deleteCategoryDefault($id);
}