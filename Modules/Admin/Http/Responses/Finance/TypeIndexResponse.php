<?php
namespace Modules\Admin\Http\Responses\Finance;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Type;
use DataTables;


class TypeIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::finance.type');
    }
    public function DataTable()
    {
        $categories = Type::orderBy('id', 'asc')->get();
        
        $no = 0;
        $data = array();
        foreach ($categories as $Type) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row[] = $Type->id;
        $row[] = $Type->name;
        $row[] = $Type->note;
        $row[] = "<a href='#' onclick='editForm(\"".$Type->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$Type->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}