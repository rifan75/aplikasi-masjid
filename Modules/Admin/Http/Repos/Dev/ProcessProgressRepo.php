<?php
namespace Modules\Admin\Http\Repos\Dev;

use Modules\Admin\Http\Repos\Dev\ProcessProgressRepoInterface;
use Modules\Admin\Entities\Progress;
use Auth;

class ProcessProgressRepo implements ProcessProgressRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createProgressDefault($progressData)
    {
        $data = [
            'dev_id'  =>   $progressData->dev_id,
            'date'  =>   $progressData->date,
            'description'  =>   $progressData->description,
        ];

        $progress = Progress::create($data);
        
        return $progress;
    }

    public function updateProgressDefault($progressData, $id)
    { 
        $data = [
            'dev_id'  =>   $progressData->dev_id,
            'date'  =>   $progressData->date,
            'description'  =>   $progressData->description,
        ];
        $progress = Progress::where('id',$id)->first();
        $progress->update($data);

        return $progress;   
    }

    public function deleteProgressDefault($id)
    { 
        $progress = Progress::where('id',$id)->first();
        $progress->delete();
        return $progress;   
    }
}