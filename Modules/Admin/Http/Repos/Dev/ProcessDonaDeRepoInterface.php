<?php
namespace Modules\Admin\Http\Repos\Dev;

interface ProcessDonaDeRepoInterface 
{
    public function createDonaDeDefault($donadeData);
    public function updateDonaDeDefault($donadeData, $id);
    public function deleteDonaDeDefault($id);
}