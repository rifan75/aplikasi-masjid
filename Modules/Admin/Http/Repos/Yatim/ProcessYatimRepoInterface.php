<?php
namespace Modules\Admin\Http\Repos\Yatim;

interface ProcessYatimRepoInterface 
{
    public function createYatimDefault($yatimData);
    public function updateYatimDefault($yatimData, $id);
    public function deleteYatimDefault($id);
}