<?php
namespace Modules\Admin\Http\Repos\User;

interface ProcessMyUserRepoInterface 
{
    public function updateMyUserDefault($userData, $id);
}