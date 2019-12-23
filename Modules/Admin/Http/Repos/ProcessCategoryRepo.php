<?php
namespace Modules\Admin\Http\Repos;

use Modules\Admin\Http\Repos\ProcessCategoryRepoInterface;
use Modules\Admin\Entities\Category;
use Auth;

class ProcessCategoryRepo implements ProcessCategoryRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createCategoryDefault($categoryData)
    {
        $data = [
            'name'       =>   $categoryData->name,
            'note'       =>   $categoryData->note,
        ];

        $category = Category::create($data);
        
        return $category;
    }

    public function updateCategoryDefault($categoryData, $id)
    { 
        $data = [
          "name"    => $categoryData->name,
          'note'   =>   $categoryData->note,
        ];
        $category = Category::where('id',$id)->first();
        $category->update($data);
        return $category;   
    }

    public function deleteCategoryDefault($id)
    { 
        $category = Category::where('id',$id)->first();
        $category->delete();
        return $category;   
    }
}