<?php
namespace Modules\Admin\Http\Responses\Mustahiq;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Mustahiq;
use DataTables;


class MustahiqIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::mustahiq.mustahiq');
    }
    public function DataTable()
    {
        $mustahiqs = Mustahiq::orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($mustahiqs as $mustahiq) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $mustahiq->id;
        $row['name'] = $mustahiq->name;
        $row['type'] = $mustahiq->type;
        $row['note'] = $mustahiq->note;
        $row['picture'] = $mustahiq->getFirstMediaUrl('mustahiq')==null ? asset('images/picture.jpg') : $Mustahiq->getFirstMediaUrl('mustahiq');
        $row['gender'] = $mustahiq->contact["Gender"];
        $row['address'] = $mustahiq->contact["Address"];
        $row['city'] = $mustahiq->contact["City"];
        $row['country'] = $mustahiq->contact["Country"];
        $row['telephone'] = $mustahiq->contact["Telephone"];
        $row['action'] = "<a href='#' onclick='editForm(\"".$mustahiq->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$mustahiq->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}