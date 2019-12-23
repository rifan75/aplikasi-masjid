<?php
namespace Modules\Admin\Http\Responses\Finance;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Cost;
use Modules\Admin\Entities\Type;
use DataTables;


class CostIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $types = Type::all();

        if($request->ajax()){
            return $this->DataTable();
        }

        return view('admin::finance.cost',compact('types'));
    }
    public function DataTable()
    {
        $costs = Cost::orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($costs as $cost) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row[] = $cost->id;
        $row[] = $cost->name;
        $row[] = $cost->type;
        $row[] = $cost->note;
        $row[] = "<a href='#' onclick='editForm(\"".$cost->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$cost->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}