<?php
namespace Modules\Admin\Http\Responses\Role;

use Illuminate\Contracts\Support\Responsable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use DataTables;


class RoleIndexResponse implements Responsable
{
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
          $roles = Role::where('name','!=','admin')->orderBy('id', 'DESC')->get();
          $no = 0;
          $data = array();
          foreach ($roles as $role) {
            $no ++;
            $row = array();
            $row[] = 'bizofon';
            $row[] = $no;
            $row[] = $role->id;
            $row[] = __('admin::role.'.$role->name);
            $permission_name = array();
            foreach ($role->permissions()->get() as $permission){
                $permission_name[] = __('admin::role.'.$permission->name);
            }
            $permission_names = implode(", ",$permission_name);
            $row[] = $permission_names;
            $row[] = "<a href='#' onclick='editForm(\"".$role->id."\")'><i class='fa fa-pencil-square-o' title='edit'></i></a>
                     </a>";
            $data[] = $row;
          }
          return DataTables::of($data)->escapeColumns([])->make(true);
    }
}