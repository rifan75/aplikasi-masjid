<?php

namespace Modules\Admin\Http\Controllers\Dev;

use Modules\Admin\Http\Controllers\Controller;
use Modules\Admin\Http\Responses\Dev\FinDeIndexResponse;

class FinDeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(FinDeIndexResponse $response)
    {
        return $response;
    }

}
