<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HomeServices;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
