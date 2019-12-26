<?php
namespace Modules\Admin\Http\Repos\Dev;

use Modules\Admin\Http\Repos\Dev\ProcessDevRepoInterface;
use Modules\Admin\Entities\Dev;
use Auth;

class ProcessDevRepo implements ProcessDevRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createDevDefault($devData)
    {
        $data = [
            'name'  =>   $devData->name,
            'slug'  =>   $devData->slug,
            'description'  =>   $devData->description,
        ];

        $dev = Dev::create($data);
        
        return $dev;
    }

    public function updateDevDefault($devData, $id)
    { 
        $data = [
            'name'  =>   $devData->name,
            'slug'  =>   $devData->slug,
            'description'  =>   $devData->description,
        ];
        $dev = Dev::where('id',$id)->first();
        $dev->update($data);

        return $dev;   
    }

    public function deleteDevDefault($id)
    { 
        $dev = Dev::where('id',$id)->first();
        $dev->delete();
        return $dev;   
    }
}