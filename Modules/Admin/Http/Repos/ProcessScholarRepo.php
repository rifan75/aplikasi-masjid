<?php
namespace Modules\Admin\Http\Repos;

use Modules\Admin\Http\Repos\ProcessScholarRepoInterface;
use Modules\Admin\Entities\Scholar;
use Auth;

class ProcessscholarRepo implements ProcessscholarRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createScholarDefault($scholarData)
    {
        $contact = [
            'Gender' => $scholarData->gender,
            'Address' => $scholarData->address,
            'City' => $scholarData->city,
            'Country' => $scholarData->country,
            'Telephone' => $scholarData->telephone,
        ];

        $data = [
            'name'       =>   $scholarData->name,
            'contact'    =>   $contact,
            'note'       =>   $scholarData->note,
        ];

        $scholar = Scholar::create($data);
        
        return $scholar;
    }

    public function updateScholarDefault($scholarData, $id)
    { 
        $contact = [
            'Gender' => $scholarData->gender,
            'Address' => $scholarData->address,
            'City' => $scholarData->city,
            'Country' => $scholarData->country,
            'Telephone' => $scholarData->telephone,
        ];
        $data = [
          'name'    =>  $scholarData->name,
          'contact' =>  $contact,
          'note'    =>  $scholarData->note,
        ];
        $scholar = Scholar::where('id',$id)->first();
        $scholar->update($data);
        return $scholar;   
    }

    public function deleteScholarDefault($id)
    { 
        $scholar = Scholar::where('id',$id)->first();
        $scholar->delete();
        return $scholar;   
    }
}