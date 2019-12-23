<?php
namespace Modules\Admin\Http\Repos\Finance;

interface ProcessTypeRepoInterface 
{
    public function createTypeDefault($typeData);
    public function updateTypeDefault($typeData, $id);
    public function deleteTypeDefault($id);
}