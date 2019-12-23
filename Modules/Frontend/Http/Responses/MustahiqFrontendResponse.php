<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Frontend\Entities\Mosque;
use Modules\Frontend\Entities\Mustahiq;
use DataTables;

class MustahiqFrontendResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $mosque = Mosque::all()->first();
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('frontend::mosque.mustahiq-list',compact('datenow','mosque'));
    }

    public function DataTable()
    {
        $mustahiqs =  Mustahiq::orderBy('created_at','DESC')->get();
        
        $no = 0;
        $data = array();
        foreach ($mustahiqs as $mustahiq) {
            $no ++;
            $row = array();
            $row['no'] = $no;
            $row['name'] = $mustahiq->name;
            $row['gender'] = $mustahiq->contact['Gender'];
            $row['type'] = $mustahiq->type;
            $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}