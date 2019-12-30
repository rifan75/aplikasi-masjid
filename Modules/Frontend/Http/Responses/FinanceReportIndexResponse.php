<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Frontend\Entities\Mosque;
use Modules\Admin\Entities\Donation;
use Modules\Admin\Entities\DetailDonation;
use Modules\Admin\Entities\Cost;
use Modules\Admin\Entities\DetailCost;
use Carbon\Carbon;

class FinanceReportIndexResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $datenowgeo = Carbon::now()->translatedFormat('l, d F Y');

        $fridaybef = Carbon::now()->previous(Carbon::FRIDAY);
        $fridaybeftrans= $fridaybef->translatedFormat('d F Y');

        $mosque = Mosque::all()->first();

        $donations = Donation::where ('type','Masjid')->get();
        $donations_id = Donation::where ('type','Masjid')->pluck('id')->toArray();
        $incometotal =  DetailDonation::whereIn('donations_id',$donations_id)->get()->sum('amount');
        $incometotalbef =  DetailDonation::whereIn('donations_id',$donations_id)
                                ->where('date','<',$fridaybef)
                                ->get()->sum('amount');

        $costs = Cost::where ('type','Masjid')->get();
        $costs_id = Cost::where ('type','Masjid')->pluck('id')->toArray();
        $costtotal =  DetailCost::whereIn('cost_id',$costs_id)->get()->sum('amount');
        $costtotalbef =  DetailCost::whereIn('cost_id',$costs_id)
                            ->where('date','<',$fridaybef)
                            ->get()->sum('amount');

        foreach ($donations as $donation)
        {
            $incomeSrc[] = $donation->name;
            $income[] =  DetailDonation::where('donations_id',$donation->id)
                        ->whereBetween('date', [$fridaybef, Carbon::now()])
                        ->get()->sum('amount');

        }

        foreach ($costs as $cost)
        {
            $costSrc[] = $cost->name;
            $costval[] =  DetailCost::where('cost_id',$cost->id)
                            ->whereBetween('date', [$fridaybef, Carbon::now()])
                            ->get()->sum('amount');

        }
            
        $remaining = $incometotal - $costtotal;
        $remainingbef = $incometotalbef - $costtotalbef;

        return view('frontend::mosque.finance-report',
        compact('datenow','datenowgeo','mosque','incomeSrc','income','incometotal','costSrc','costval',
        'costtotal','remaining','fridaybeftrans','remainingbef'));
    }

}