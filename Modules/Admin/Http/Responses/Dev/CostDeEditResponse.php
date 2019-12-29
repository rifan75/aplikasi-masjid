<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\DetailCost;

class CostDeEditResponse implements Responsable
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
        $costde = DetailCost::where('id',$this->id)->first();
        
        $data = [
            'cost_id' => $costde->cost_id,
            'name' => $costde->name,
            'amount' => $costde->amount,
            'date' => $costde->dateedit,
            'note' => $costde->note,
        ];
  
        echo json_encode($data);
    }
}