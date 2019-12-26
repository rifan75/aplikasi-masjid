<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Progress;
use Modules\Admin\Entities\Dev;
use DataTables;


class ProgressIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::dev.progress');
    }
    public function DataTable()
    {
        $progresss = Progress::with('image')->orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($progresss as $progress) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $progress->id;

        $row['name'] = $progress->dev->name;
        $row['date'] = $progress->date;
        $row['description'] = $progress->description;

        $row['preview'] = '<a href="/admin/progress/'.$progress->slug.'" id="createbutton" type="button" class=" btn-sm btn-success" style="margin-bottom:5px">'.__("admin::event.preview").'</a>';
      
        $row['action'] = "<a href='/admin/progress/".$progress->id."/edit'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$progress->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}