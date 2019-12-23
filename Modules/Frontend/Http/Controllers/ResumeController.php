<?php

namespace Modules\Frontend\Http\Controllers;

use Modules\Frontend\Http\Responses\LectureIndexResponse;
use Modules\Frontend\Http\Responses\ShortResumeIndexResponse;
use Modules\Frontend\Http\Responses\ResumeIndexResponse;

class ResumeController extends Controller
{
    public function index()
    {
      $datenow = \GeniusTS\HijriDate\Date::now()->format('l, d F Y');
      return view('frontend::shortresume',compact('datenow')); 
    }

    public function resume(ResumeIndexResponse $response)
    {
      return $response;
    }

    public function showlecture(LectureIndexResponse $response)
    {
      return $response;
    }

    public function showshortresume(ShortResumeIndexResponse $response)
    {
      return $response;
    }
}
