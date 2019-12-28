<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\DetailCost;
use Modules\Admin\Entities\Cost;
use DataTables;


class CostDeIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $type = $request->type;
        $costs = Cost::where('type',$type)->get();
        if($request->ajax()){
            return $this->DataTable($type);
        }
        return view('admin::dev.costde',compact('costs','type'));
    }
    public function DataTable($type)
    {
        $cost = Cost::where('type',$type)->pluck('id')->toArray();
        $costs = DetailCost::with('costa')->whereIn('cost_id',$cost)->orderBy('id', 'desc')->get();

        $no = 0;
        $data = array();
        foreach ($costs as $cost) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $cost->id;
        $row['cost_id'] = $cost->cost_id;
        $row['name'] = $cost->name;
        $row['amount'] = number_format($cost->amount,0,',','.');
        $row['date'] = $cost->date;
        $row['account'] = $cost->costa->name;
        $row['action'] = "<a href='#' onclick='editForm(\"".$cost->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$cost->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}