<?php
namespace Modules\Admin\Http\Repos\Yatim;

use Modules\Admin\Http\Repos\Yatim\ProcessYatimRepoInterface;
use Modules\Admin\Entities\Yatim;
use Auth;

class ProcessYatimRepo implements ProcessYatimRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createYatimDefault($yatimData)
    {
        $contact = [
            'Gender' => $yatimData->gender,
            'Address' => $yatimData->address,
            'City' => $yatimData->city,
            'Country' => $yatimData->country,
            'Telephone' => $yatimData->telephone,
        ];

        $data = [
            'name'       =>   $yatimData->name,
            'birth'      =>  $yatimData->birth,
            'contact'    =>   $contact,
            'note'       =>   $yatimData->note,
        ];

        $yatim = Yatim::create($data);
        
        return $yatim;
    }

    public function updateYatimDefault($yatimData, $id)
    { 
        $contact = [
            'Gender' => $yatimData->gender,
            'Address' => $yatimData->address,
            'City' => $yatimData->city,
            'Country' => $yatimData->country,
            'Telephone' => $yatimData->telephone,
        ];
        $data = [
          'name'    =>  $yatimData->name,
          'birth'   =>  $yatimData->birth,
          'contact' =>  $contact,
          'note'    =>  $yatimData->note,
        ];
        $yatim = Yatim::where('id',$id)->first();
        $yatim->update($data);
        return $yatim;   
    }

    public function deleteYatimDefault($id)
    { 
        $yatim = Yatim::where('id',$id)->first();
        $yatim->delete();
        return $yatim;   
    }
}