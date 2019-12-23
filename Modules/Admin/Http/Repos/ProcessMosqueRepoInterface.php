<?php
namespace Modules\Admin\Http\Repos;

interface ProcessMosqueRepoInterface 
{
    public function updateMosqueDefault($mosqueData, $id);
}