<?php
namespace Modules\Admin\Http\Responses\Scholar;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Scholar;
use DataTables;


class ScholarIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::scholar');
    }
    public function DataTable()
    {
        $scholars = Scholar::orderBy('id', 'asc')->get();
        
        $no = 0;
        $data = array();
        foreach ($scholars as $scholar) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $scholar->id;
        $row['name'] = $scholar->name;
        $row['note'] = $scholar->note;
        $row['picture'] = $scholar->getFirstMediaUrl('scholar')==null ? asset('images/picture.jpg') : $scholar->getFirstMediaUrl('scholar');
        $row['gender'] = $scholar->contact["Gender"];
        $row['address'] = $scholar->contact["Address"];
        $row['city'] = $scholar->contact["City"];
        $row['country'] = $scholar->contact["Country"];
        $row['telephone'] = $scholar->contact["Telephone"];
        $row['action'] = "<a href='#' onclick='editForm(\"".$scholar->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$scholar->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}