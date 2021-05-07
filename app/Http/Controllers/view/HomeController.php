<?php

namespace App\Http\Controllers\view;

use Illuminate\Support\Facades\Auth;
use App\Services\UserServices;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
        $myId = Auth::id();
        $listFriend = $this->userServices->listFriend($myId);
        return view('home', ['listFriend' => $listFriend]);
    }
}
