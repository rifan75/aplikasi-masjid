<?php
namespace Modules\Admin\Http\Repos\Finance;

use Modules\Admin\Http\Repos\Finance\ProcessTypeRepoInterface;
use Modules\Admin\Entities\Type;
use Auth;

class ProcessTypeRepo implements ProcessTypeRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createTypeDefault($typeData)
    {
        $data = [
            'name'       =>   $typeData->name,
            'note'       =>   $typeData->note,
        ];

        $type = Type::create($data);
        
        return $type;
    }

    public function updateTypeDefault($typeData, $id)
    { 
        $data = [
          "name"    =>  $typeData->name,
          'note'    =>  $typeData->note,
        ];
        $type = Type::where('id',$id)->first();
        $type->update($data);
        return $type;   
    }

    public function deleteTypeDefault($id)
    { 
        $type = Type::where('id',$id)->first();
        $type->delete();
        return $type;   
    }
}