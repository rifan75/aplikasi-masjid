<?php
namespace Modules\Admin\Http\Responses\User;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\User;
use Spatie\Permission\Models\Role;
use DataTables;


class UserIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        $levels=Role::all();
        
        if($request->ajax()){
            return $this->UserDataTable();
        }
            return view('admin::user.user',compact('levels')); 
    }

    protected function UserDataTable()
    {
        
        $users = User::all();
        $no = 0;
        $data = array();
        
        foreach ($users as $user) {
            $no ++;
            $row = array();
            $row[] = $no;
            $row['id'] = $user->id;
            $row['name'] = $user->name;
            $row['email'] = $user->email;
            $row['role'] = __('admin::role.'.$user->getRoleNames()->first());
            $row['picture'] = $user->getFirstMediaUrl('picture')==null ? asset('images/picture.jpg') : $user->getFirstMediaUrl('picture');
            if($user->getRoleNames()->first()!="admin"){
                $row['action'] = "<a href='#' onclick='editForm(\"".$user->id."\")'><i class='fa fa-pencil-square-o' title='edit'></i></a>
                            &nbsp;
                        <a href='#' onclick='deleteForm(\"".$user->id."\")' type='submit'><i class='fa fa-trash' title='erase'></i></a>";
                if($user->active==1){
                $row['active'] = "<a href='#' onclick='editAct(\"".$user->id."\",\"".$user->active."\")'><i class='fa fa-check' title='edit'></i></a>";
                }else{
                $row['active'] = "<a href='#' onclick='editAct(\"".$user->id."\",\"".$user->active."\")'><i class='fa fa-ban' title='edit'></i></a>";
                }
            }else{
                $row['action'] = "<a href='#' onclick='editForm(\"".$user->id."\")'><i class='fa fa-pencil-square-o' title='edit'></i></a>";
                $row['active'] = "<i class='fa fa-check' title='edit'></i>";
            }
            $row['profile_gender'] = $user->profile->contact["Gender"];
            $row['profile_address'] = $user->profile->contact["Address"];
            $row['profile_city'] = $user->profile->contact["City"];
            $row['profile_country'] = $user->profile->contact["Country"];
            $row['profile_telephone'] = $user->profile->contact["Telephone"];
            $data[] = $row;
        }

        return DataTables::of($data)->escapeColumns([])->make(true);
    }
}