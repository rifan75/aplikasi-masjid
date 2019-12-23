<?php
namespace Modules\Admin\Http\Repos\Finance;

interface ProcessCostRepoInterface 
{
    public function createCostDefault($costData);
    public function updateCostDefault($costData, $id);
    public function deleteCostDefault($id);
}