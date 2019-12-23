<?php
namespace Modules\Admin\Http\Repos\User;

use Modules\Admin\Http\Repos\User\ProcessMyUserRepoInterface;
use Modules\Admin\Entities\User;
use Modules\Admin\Entities\Profile;
use Auth;
use DB;

class ProcessMyUserRepo implements ProcessMyUserRepoInterface
{
    public function __construct()
    {
        //
    }

    public function updateMyUserDefault($userData, $id)
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
          "email"    => $userData->email,
        ];

        DB::transaction(function () use($userData,$data,$dataprofile,$profile,&$user) {
          $user->syncRoles([$userData->level]);
          $user->update($data);  
          $profile->update($dataprofile);  
        });

        return $user;   
    }
}