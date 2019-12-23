<?php
namespace Modules\Admin\Http\Repos\User;

interface ProcessUserRepoInterface 
{
    public function updateUserDefault($userData, $id);
    public function deleteUserDefault($id);
}