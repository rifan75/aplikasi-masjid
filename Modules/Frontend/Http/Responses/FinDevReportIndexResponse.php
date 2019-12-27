<?php
namespace Modules\Admin\Http\Responses\Dev;

use Illuminate\Contracts\Support\Responsable;
use Modules\Admin\Entities\Donation;
use Modules\Admin\Entities\DetailDonation;
use Modules\Admin\Entities\Cost;
use Modules\Admin\Entities\DetailCost;

class FinDevIndexResponse implements Responsable
{

    public function toResponse($request)
    {
        $donations = Donation::where ('type','Pembangunan')->get();
        $donations_id = Donation::where ('type','Pembangunan')->pluck('id')->toArray();
        $incometotal =  DetailDonation::whereIn('donations_id',$donations_id)->get()->sum('amount');
        $costs = Cost::where ('type','Pembangunan')->get();
        $costs_id = Cost::where ('type','Pembangunan')->pluck('id')->toArray();
        $costtotal =  DetailCost::whereIn('cost_id',$costs_id)->get()->sum('amount');

        foreach ($donations as $donation)
        {
            $incomeSrc[] = $donation->name;
            $income[] =  DetailDonation::where('donations_id',$donation->id)->get()->sum('amount');

        }

        foreach ($costs as $cost)
        {
            $costSrc[] = $cost->name;
            $costval[] =  DetailCost::where('cost_id',$cost->id)->get()->sum('amount');

        }
            
        $remaining = $incometotal - $costtotal;

        return view('admin::dev.dev_finance',
              compact('incomeSrc','income','incometotal','costSrc','costval','costtotal','remaining'));
    }

}