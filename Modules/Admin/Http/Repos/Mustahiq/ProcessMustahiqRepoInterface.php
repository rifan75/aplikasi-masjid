<?php
namespace Modules\Admin\Http\Repos\Mustahiq;

interface ProcessMustahiqRepoInterface 
{
    public function createMustahiqDefault($mustahiqData);
    public function updateMustahiqDefault($mustahiqData, $id);
    public function deleteMustahiqDefault($id);
}