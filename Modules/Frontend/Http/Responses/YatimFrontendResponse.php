<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Frontend\Entities\Mosque;
use Modules\Frontend\Entities\Yatim;
use DataTables;

class YatimFrontendResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $mosque = Mosque::all()->first();
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('frontend::mosque.yatim-list',compact('datenow','mosque'));
    }

    public function DataTable()
    {
        $yatims =  Yatim::where('status',true)->orderBy('created_at','DESC')->get();
        
        $no = 0;
        $data = array();
        foreach ($yatims as $yatim) {
            $no ++;
            $row = array();
            $row['no'] = $no;
            $row['name'] = $yatim->name;
            $row['gender'] = $yatim->contact['Gender'];
            $row['birth'] = $yatim->birth;
            $row['age'] = $yatim->age;
            $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}