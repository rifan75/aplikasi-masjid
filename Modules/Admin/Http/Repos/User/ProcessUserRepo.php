<?php
namespace Modules\Admin\Http\Repos\User;

use Modules\Admin\Http\Repos\User\ProcessUserRepoInterface;
use Modules\Admin\Entities\User;
use Modules\Admin\Entities\Profile;
use DB;

class ProcessUserRepo implements ProcessUserRepoInterface
{
    public function __construct()
    {
        //
    }

    public function updateUserDefault($userData, $id)
    { 
        $user = User::where('id',$id)->first();
        $profile = Profile::where('user_id',$user->id)->first();

        $contact = [
              'Gender' => $userData->gender,
              'Address' => $userData->address,
              'City' => $userData->city,
              'Country' => $userData->country,
              'Telephone' => $userData->telephone,
        ];

        $dataprofile = [
          "contact"    => $contact,
        ];

        $data = [
          "name"    => $userData->name,
        ];

        DB::transaction(function () use($userData,$data,$dataprofile,$profile,&$user) {
          $user->syncRoles([$userData->level]);
          $user->update($data);  
          $profile->update($dataprofile);  
        });

        return $user;   
    }

    public function deleteUserDefault($id)
    { 
        $user = User::where('id',$id)->first();
        $profile = Profile::where('user_id',$user->id)->first();
        DB::transaction(function () use($profile,&$user) {
            $role = $user->getRoleNames()->first();
            $user->removeRole($role);
            $user->delete();
            $profile->delete();
        });
        return $user;   
    }

}