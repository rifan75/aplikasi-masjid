<?php
namespace Modules\Admin\Http\Responses\Finance;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Donation;
use Modules\Admin\Entities\Type;
use DataTables;


class DonationIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $types = Type::all();

        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::finance.donation',compact('types'));
    }
    public function DataTable()
    {
        $donations = Donation::orderBy('id', 'desc')->get();
        
        $no = 0;
        $data = array();
        foreach ($donations as $donation) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row['id'] = $donation->id;
        $row['name'] = $donation->name;
        $row['form'] = __('admin::donation.'.$donation->form);
        $row['type'] = $donation->type;
        if($donation->status){
            $row['status'] = "<a href='#' onclick='editAct(\"".$donation->id."\",\"".$donation->status."\")'><i class='fa fa-check' title='edit'></i></a>";
        }else{
            $row['status'] = "<a href='#' onclick='editAct(\"".$donation->id."\",\"".$lecture->status."\")'><i class='fa fa-ban' title='edit'></i></a>";
        }
        if($donation->form == 'lock_box'){
            $row['formtrue'] = true;
            $row['incharge'] = $donation->contact['incharge'];
            $row['counter'] = $donation->contact['counter'];
            $row['witness1'] = $donation->contact['witness1'];
            $row['witness2'] = $donation->contact['witness2'];
        }else{
            $row['received'] = $donation->contact['received'];
            $row['confirmation'] = $donation->contact['confirmation'];
        }
        $row['note'] = $donation->note;
        $row['action'] = "<a href='#' onclick='editForm(\"".$donation->id."\")'><i class='fa fa-pencil-square-o'></i></a>
                        &nbsp;&nbsp;&nbsp;
                    <a href='#' onclick='deleteForm(\"".$donation->id."\")' type='submit'><i class='fa fa-trash'></i></a>";
        $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}