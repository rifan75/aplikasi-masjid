<?php
namespace Modules\Admin\Http\Repos\User;

use Modules\Admin\Http\Repos\User\ProcessRoleRepoInterface;
use Spatie\Permission\Models\Role;

class ProcessRoleRepo implements ProcessRoleRepoInterface
{
    public function __construct()
    {
        //
    }

    public function updateRoleDefault($roleData, $id)
    { 
        $role = Role::find($id);
        $role->syncPermissions($roleData->permission);
        return $role;   
    }

}