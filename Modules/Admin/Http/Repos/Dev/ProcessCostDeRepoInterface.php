<?php
namespace Modules\Admin\Http\Repos\Dev;

interface ProcessCostDeRepoInterface 
{
    public function createCostDeDefault($costdeData);
    public function updateCostDeDefault($costdeData, $id);
    public function deleteCostDeDefault($id);
}