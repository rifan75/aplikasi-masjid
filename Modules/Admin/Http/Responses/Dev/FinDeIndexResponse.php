<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Dev;
use DataTables;


class FinDeIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::dev.dev_finance');
    }
    public function DataTable()
    {
        $devs = Dev::orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($devs as $dev) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $dev->id;
        $row['name'] = $dev->name;
        $row['account'] = $dev->type;
        $row['description'] = $dev->description;
        if($dev->status){
            $row['status'] = "<i class='fa fa-check' title='edit'></i>";
        }else{
            $row['status'] = "<i class='fa fa-ban' title='edit'></i>";
        }
        $row['action'] = '<a href="/admin/donade/'.$dev->type.'" id="createbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">'.__("admin::dev.donation_journal").'</a>
                        <a href="/admin/costde/'.$dev->type.'" id="createbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">'.__("admin::dev.cost_journal").'</a>';
 
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}