<?php
namespace Modules\Admin\Http\Repos\Mustahiq;

use Modules\Admin\Http\Repos\Mustahiq\ProcessMustahiqRepoInterface;
use Modules\Admin\Entities\Mustahiq;
use Auth;

class ProcessMustahiqRepo implements ProcessMustahiqRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createMustahiqDefault($mustahiqData)
    {
        $contact = [
            'Gender' => $mustahiqData->gender,
            'Address' => $mustahiqData->address,
            'City' => $mustahiqData->city,
            'Country' => $mustahiqData->country,
            'Telephone' => $mustahiqData->telephone,
        ];

        $data = [
            'name'       =>   $mustahiqData->name,
            'type'       =>  $mustahiqData->type,
            'contact'    =>   $contact,
            'note'       =>   $mustahiqData->note,
        ];

        $mustahiq = Mustahiq::create($data);
        
        return $mustahiq;
    }

    public function updateMustahiqDefault($mustahiqData, $id)
    { 
        $contact = [
            'Gender' => $mustahiqData->gender,
            'Address' => $mustahiqData->address,
            'City' => $mustahiqData->city,
            'Country' => $mustahiqData->country,
            'Telephone' => $mustahiqData->telephone,
        ];
        $data = [
          'name'    =>  $mustahiqData->name,
          'type'    =>  $mustahiqData->type,
          'contact' =>  $contact,
          'note'    =>  $mustahiqData->note,
        ];
        $mustahiq = Mustahiq::where('id',$id)->first();
        $mustahiq->update($data);
        return $mustahiq;   
    }

    public function deleteMustahiqDefault($id)
    { 
        $mustahiq = Mustahiq::where('id',$id)->first();
        $mustahiq->delete();
        return $mustahiq;   
    }
}