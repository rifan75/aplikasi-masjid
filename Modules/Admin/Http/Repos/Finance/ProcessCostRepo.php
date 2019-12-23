<?php
namespace Modules\Admin\Http\Repos\Finance;

use Modules\Admin\Http\Repos\Finance\ProcessCostRepoInterface;
use Modules\Admin\Entities\Cost;

class ProcessCostRepo implements ProcessCostRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createCostDefault($costData)
    {
        $data = [
            'name'       =>   $costData->name,
            'type'       =>   $costData->type,
            'note'       =>   $costData->note,
        ];

        $cost = Cost::create($data);
        
        return $cost;
    }

    public function updateCostDefault($costData, $id)
    { 
        $data = [
          "name"    =>  $costData->name,
          'type'       =>   $costData->type,
          'note'    =>  $costData->note,
        ];
        $cost = Cost::where('id',$id)->first();
        $cost->update($data);
        return $cost;   
    }

    public function deleteCostDefault($id)
    { 
        $cost = Cost::where('id',$id)->first();
        $cost->delete();
        return $cost;   
    }
}