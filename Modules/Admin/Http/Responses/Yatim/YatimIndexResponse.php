<?php
namespace Modules\Admin\Http\Responses\Yatim;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Yatim;
use DataTables;


class YatimIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::yatim.yatim');
    }
    public function DataTable()
    {
        $yatims = Yatim::orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($yatims as $yatim) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $yatim->id;
        $row['name'] = $yatim->name;
        $row['age'] = $yatim->age;
        $row['birth'] = $yatim->birth;
        $row['note'] = $yatim->note;
        $row['picture'] = $yatim->getFirstMediaUrl('yatim')==null ? asset('images/picture.jpg') : $Yatim->getFirstMediaUrl('yatim');
        $row['gender'] = $yatim->contact["Gender"];
        $row['address'] = $yatim->contact["Address"];
        $row['city'] = $yatim->contact["City"];
        $row['country'] = $yatim->contact["Country"];
        $row['telephone'] = $yatim->contact["Telephone"];
        $row['action'] = "<a href='#' onclick='editForm(\"".$yatim->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$yatim->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}