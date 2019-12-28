<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\DetailDonation;
use Modules\Admin\Entities\Donation;
use DataTables;


class DonaDeIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $type = $request->type;
        $donations = Donation::where('type',$type)->get();
        if($request->ajax()){
            return $this->DataTable($type);
        }
        return view('admin::dev.donade',compact('donations','type'));
    }
    public function DataTable($type)
    {
        $dona = Donation::where('type',$type)->pluck('id')->toArray();
        $donations = DetailDonation::with('dona')->whereIn('donations_id',$dona)->orderBy('id', 'desc')->get();

        $no = 0;
        $data = array();
        foreach ($donations as $donation) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $donation->id;
        $row['donations_id'] = $donation->donations_id;
        $row['name'] = $donation->name;
        $row['amount'] = number_format($donation->amount,0,',','.');
        $row['date'] = $donation->date;
        $row['account'] = $donation->dona->name;
        $row['action'] = "<a href='#' onclick='editForm(\"".$donation->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$donation->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}