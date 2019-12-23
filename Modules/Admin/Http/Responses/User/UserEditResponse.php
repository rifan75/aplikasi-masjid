<?php
namespace Modules\Admin\Http\Responses\User;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\User;
use Spatie\Permission\Models\Role;
use Auth;


class UserEditResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

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
        $user=User::find($this->id);
        $data = [
        'name' => $user->name,
        'level' => $user->getRoleNames()->first(),
        'gender' => $user->profile->contact['Gender'],
        'address' => $user->profile->contact['Address'],
        'city' => $user->profile->contact['City'],
        'country' => $user->profile->contact['Country'],
        'telephone' => $user->profile->contact['Telephone'],
        'full_picture_path' => $user->getFirstMediaUrl('picture')==null ? asset('images/picture.jpg') : $user->getFirstMediaUrl('picture'),
        ];
        echo json_encode($data);
    }
}