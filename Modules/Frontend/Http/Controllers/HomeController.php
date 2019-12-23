<?php

namespace Modules\Frontend\Http\Controllers;

use Modules\Frontend\Entities\FridaySchedule;
use Modules\Frontend\Entities\Mosque;
use Modules\Frontend\Entities\Kajianku;
use Modules\Frontend\Entities\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
      $mosque = Mosque::all()->first();
      $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
      
      return view('frontend::home',compact('datenow','mosque'));
    }

    public function login()
    {
      $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
      
      return view('frontend::auth.login',compact('datenow'));
    }

}
