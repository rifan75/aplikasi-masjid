<?php
namespace Modules\Frontend\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Modules\Frontend\Entities\Mosque;
use Carbon\Carbon;

class FinanceReportResponse implements Responsable
{
 

    public function toResponse($request)
    {
        $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
        $mosque = Mosque::all()->first();
        return view('frontend::mosque.finance-report',compact('datenow','mosque'));
    }

}