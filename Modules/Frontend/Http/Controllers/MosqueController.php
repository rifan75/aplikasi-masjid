<?php

namespace Modules\Frontend\Http\Controllers;

use Modules\Frontend\Entities\Mosque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Modules\Frontend\Http\Responses\FinanceReportResponse;
use Modules\Frontend\Http\Responses\MustahiqFrontendResponse;
use Modules\Frontend\Http\Responses\YatimFrontendResponse;

class MosqueController extends Controller
{

    public function index()
    {
      $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
      $mosque = Mosque::all()->first();
      return view('frontend::mosque.caretaker',compact('datenow','mosque'));
    }

    public function lapkeu(FinanceReportResponse $response)
    {
      return $response;
    }

    public function mustahiq(MustahiqFrontendResponse $response)
    {
      return $response;
    }

    public function yatim(YatimFrontendResponse $response)
    {
      return $response;
    }

}
