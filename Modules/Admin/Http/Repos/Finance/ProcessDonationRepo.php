<?php
namespace Modules\Admin\Http\Repos\Finance;

use Modules\Admin\Http\Repos\Finance\ProcessDonationRepoInterface;
use Modules\Admin\Entities\Donation;
use Auth;

class ProcessDonationRepo implements ProcessDonationRepoInterface
{
    public function __construct()
    {
        //
    }

    public function createDonationDefault($donationData)
    {
        $contact_box = [
            'incharge'       =>   $donationData->incharge,
            'counter'       =>   $donationData->counter,
            'witness1'       =>   $donationData->witness1,
            'witness2'       =>   $donationData->witness2,
        ];

        $contact_nonbox = [
            'received'       =>   $donationData->received,
            'confirmation'   =>   $donationData->confirmation,
        ];

        if($donationData->form=="lock_box"){
            $contact = $contact_box;
        }else{
            $contact = $contact_nonbox;
        }

        $data = [
            'name'       =>   $donationData->name,
            'contact'    =>   $contact,
            'form'       =>   $donationData->form,
            'type'       =>   $donationData->type,
            'note'       =>   $donationData->note,
        ];

        $donation = Donation::create($data);
        
        return $donation;
    }

    public function updateDonationDefault($donationData, $id)
    { 
        $contact_box = [
            'incharge'       =>   $donationData->incharge,
            'counter'       =>   $donationData->counter,
            'witness1'       =>   $donationData->witness1,
            'witness2'       =>   $donationData->witness2,
        ];

        $contact_nonbox = [
            'received'       =>   $donationData->received,
            'confirmation'   =>   $donationData->confirmation,
        ];

        if($donationData->form=="lock_box"){
            $contact = $contact_box;
        }else{
            $contact = $contact_nonbox;
        }

        $data = [
            'name'       =>   $donationData->name,
            'contact'    =>   $contact,
            'form'       =>   $donationData->form,
            'type'       =>   $donationData->type,
            'note'       =>   $donationData->note,
        ];
        $donation = Donation::where('id',$id)->first();
        $donation->update($data);
        return $donation;   
    }

    public function deleteDonationDefault($id)
    { 
        $donation = Donation::where('id',$id)->first();
        $donation->delete();
        return $donation;   
    }
}