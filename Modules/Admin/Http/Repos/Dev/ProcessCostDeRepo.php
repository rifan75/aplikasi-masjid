<?php
namespace Modules\Admin\Http\Repos\Dev;

use Modules\Admin\Http\Repos\Dev\ProcessCostDeRepoInterface;
use Modules\Admin\Entities\DetailCost;
use Auth;

class ProcessCostDeRepo implements ProcessCostDeRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createCostDeDefault($costdeData)
    {
        $data = [
            'cost_id' =>   $costdeData->cost_id,
            'name'  =>   $costdeData->name,
            'amount'  =>   $costdeData->amount,
            'date'  =>   $costdeData->date,
            'note'  =>   $costdeData->note,
        ];

        $costde = DetailCost::create($data);
        
        return $costde;
    }

    public function updateCostDeDefault($costdeData, $id)
    { 
        $data = [
            'cost_id' =>   $costdeData->cost_id,
            'name'  =>   $costdeData->name,
            'amount'  =>   $costdeData->amount,
            'date'  =>   $costdeData->date,
            'note'  =>   $costdeData->note,
        ];
        $costde = DetailCost::where('id',$id)->first();
        $costde->update($data);

        return $costde;   
    }

    public function deleteCostDeDefault($id)
    { 
        $costde = DetailCost::where('id',$id)->first();
        $costde->delete();
        return $costde;   
    }
}