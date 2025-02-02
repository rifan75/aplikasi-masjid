<?php
namespace Modules\Admin\Http\Responses\Category;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Category;
use DataTables;


class CategoryIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::category');
    }
    public function DataTable()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        
        $no = 0;
        $data = array();
        foreach ($categories as $category) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row[] = $category->id;
        $row[] = $category->name;
        $row[] = $category->note;
        $row[] = "<a href='#' onclick='editForm(\"".$category->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$category->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}