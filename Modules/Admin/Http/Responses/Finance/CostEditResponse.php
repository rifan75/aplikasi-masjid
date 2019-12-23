<?php
namespace Modules\Admin\Http\Responses\Finance;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Cost;

class CostEditResponse implements Responsable
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
        return view('admin::finance.cost');
    }

    protected function DataTable()
    {
        $cost = Cost::where('id',$this->id)->first();
        
        $data = [
            'name' => $cost->name,
            'type' => $cost->type,
            'note' => $cost->note,
        ];
  
        echo json_encode($data);
    }
}