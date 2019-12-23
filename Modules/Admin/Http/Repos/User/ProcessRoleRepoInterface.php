<?php
namespace Modules\Admin\Http\Repos\User;

interface ProcessRoleRepoInterface 
{
    public function updateRoleDefault($roleData, $id);
}