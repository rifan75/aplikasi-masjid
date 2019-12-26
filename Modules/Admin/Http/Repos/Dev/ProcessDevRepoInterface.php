<?php
namespace Modules\Admin\Http\Repos\Dev;

interface ProcessDevRepoInterface 
{
    public function createDevDefault($devData);
    public function updateDevDefault($devData, $id);
    public function deleteDevDefault($id);
}