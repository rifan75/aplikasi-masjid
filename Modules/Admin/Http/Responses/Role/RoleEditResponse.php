<?php
namespace Modules\Admin\Http\Responses\Role;

use Illuminate\Contracts\Support\Responsable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $permissions = Permission::where('guard_name', 'web')->get();
   
        if($request->ajax()){
            return $this->DataTable();
        }
        return view('admin::user.role',compact('permissions'));

    }

    protected function DataTable()
    {
        $role = Role::where('id', $this->id)->first();
        $data = [
        'name' => __('admin::role.'.$role->name),
        'permission' => $role->permissions()->get(),
        ];
        echo json_encode($data);
    }
}