<?php

namespace App\Http\Controllers\view\Friend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServices;
use App\Services\FriendServices;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    protected $userServices;
    protected $friendServices;

    public function __construct(UserServices $userServices, FriendServices $friendServices)
    {
        $this->userServices = $userServices;
        $this->friendServices = $friendServices;
    }
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    
    public function index(Request $request)
    {
        $customerId = $request->route('id');
        $myId = Auth::id();
        $detail = $this->userServices->detailOfFriend($customerId);
        $check = $this->friendServices->haveFriend($myId, $customerId);
        $status = $this->friendServices->statusOfFriend($myId, $customerId);
        return view('layouts.friends.detail', ['detail' => $detail], ['check' => $check])->with('status', $status);
    }

    public function addFriend(Request $request)
    {
        $customerId = $request->route('id');
        $slugUser = $request->route('slug_user');
        $myId = Auth::id();
        $this->friendServices->addFriend($myId, $customerId);
        $detail = $this->userServices->detailOfFriend($customerId);
        $check = $this->friendServices->haveFriend($myId, $customerId);
        $status = $this->friendServices->statusOfFriend($myId, $customerId);
        return redirect()->route('detail-friend.index', ['id' => $customerId, 'slug_user' => $slugUser])
                        ->with('detail', $detail)->with('check', $check)->with('status', $status);
    }

    public function unFriend(Request $request)
    {
        $customerId = $request->route('id');
        $slugUser = $request->route('slug_user');
        $myId = Auth::id();
        $this->friendServices->unFriend($myId, $customerId);
        $detail = $this->userServices->detailOfFriend($customerId);
        $check = $this->friendServices->haveFriend($myId, $customerId);
        $status = $this->friendServices->statusOfFriend($myId, $customerId);
        return redirect()->route('detail-friend.index', ['id' => $customerId, 'slug_user' => $slugUser])
                        ->with('detail', $detail)->with('check', $check)->with('status', $status);
    }
}
