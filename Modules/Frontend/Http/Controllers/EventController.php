<?php

namespace Modules\Frontend\Http\Controllers;

use Modules\Frontend\Http\Responses\EventIndexResponse;
use Modules\Frontend\Http\Responses\EventLainIndexResponse;

class EventController extends Controller
{
    public function index(EventIndexResponse $response)
    {
      return $response;
    }

    public function eventlain(EventLainIndexResponse $response)
    {
      return $response;
    }

}
