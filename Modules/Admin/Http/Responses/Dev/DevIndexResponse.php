<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Dev;
use DataTables;


class DevIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::dev.dev');
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
        $row['description'] = $dev->description;
        $row['slug'] = $dev->slug;
        if($dev->status){
            $row['status'] = "<a href='#' onclick='editAct(\"".$dev->id."\",\"".$dev->published."\")'><i class='fa fa-check' title='edit'></i></a>";
        }else{
            $row['status'] = "<a href='#' onclick='editAct(\"".$dev->id."\",\"".$dev->published."\")'><i class='fa fa-ban' title='edit'></i></a>";
        }
        $row['preview'] = '<a href="/admin/development/'.$dev->slug.'" id="createbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">'.__("admin::dev.preview").'</a>';
        $row['action'] = "<a href='/admin/development/".$dev->id."/edit'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$dev->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}