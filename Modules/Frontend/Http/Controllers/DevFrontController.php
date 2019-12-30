<?php

namespace Modules\Frontend\Http\Controllers;

use Modules\Admin\Entities\Dev;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Modules\Frontend\Http\Responses\FinDevReportIndexResponse;
use Modules\Frontend\Http\Responses\ProgressFrontendResponse;

class DevFrontController extends Controller
{

    public function index()
    {
      $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
      $devs = Dev::where('status',true)->paginate(1);
      return view('frontend::dev.index',compact('datenow','devs'));
    }

    public function lapkeu(FinDevReportIndexResponse $response)
    {
      return $response;
    }

    public function progress(ProgressFrontendResponse $response)
    {
      return $response;
    }

}
