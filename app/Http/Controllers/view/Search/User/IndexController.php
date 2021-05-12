<?php

namespace App\Http\Controllers\view\Search\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\UserServices;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function index()
    {
        return view('layouts.friends.find');
    }
}
