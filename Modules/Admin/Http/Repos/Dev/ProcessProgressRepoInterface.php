<?php
namespace Modules\Admin\Http\Repos\Dev;

interface ProcessProgressRepoInterface 
{
    public function createProgressDefault($progressData);
    public function updateProgressDefault($progressData, $id);
    public function deleteProgressDefault($id);
}