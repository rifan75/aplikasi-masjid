<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\DetailDonation;

class DonaDeEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::dev.dev_finance');
    }

    protected function DataTable()
    {
        $donade = DetailDonation::where('id',$this->id)->first();
        
        $data = [
            'donations_id' => $donade->donations_id,
            'name' => $donade->name,
            'amount' => $donade->amount,
            'date' => $donade->dateedit,
            'note' => $donade->note,
        ];
  
        echo json_encode($data);
    }
}