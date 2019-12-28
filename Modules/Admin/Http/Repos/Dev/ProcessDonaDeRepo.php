<?php
namespace Modules\Admin\Http\Repos\Dev;

use Modules\Admin\Http\Repos\Dev\ProcessDevRepoInterface;
use Modules\Admin\Entities\DetailDonation;
use Auth;

class ProcessDonaDeRepo implements ProcessDonaDeRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createDonaDeDefault($donadeData)
    {
        $data = [
            'donations_id' =>   $donadeData->donations_id,
            'name'  =>   $donadeData->name,
            'amount'  =>   $donadeData->amount,
            'date'  =>   $donadeData->date,
            'note'  =>   $donadeData->note,
        ];

        $donade = DetailDonation::create($data);
        
        return $donade;
    }

    public function updateDonaDeDefault($donadeData, $id)
    { 
        $data = [
            'donations_id' =>   $donadeData->donations_id,
            'name'  =>   $donadeData->name,
            'amount'  =>   $donadeData->amount,
            'date'  =>   $donadeData->date,
            'note'  =>   $donadeData->note,
        ];
        $donade = DetailDonation::where('id',$id)->first();
        $donade->update($data);

        return $donade;   
    }

    public function deleteDonaDeDefault($id)
    { 
        $donade = DetailDonation::where('id',$id)->first();
        $donade->delete();
        return $donade;   
    }
}