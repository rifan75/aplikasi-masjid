<?php
namespace Modules\Admin\Http\Responses\Category;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Category;

class CategoryEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::category');
    }

    protected function DataTable()
    {
        $category = Category::where('id',$this->id)->first();
        
        $data = [
            'name' => ucfirst($category->name),
            'note' => $category->note,
        ];
  
        echo json_encode($data);
    }
}