<?php

namespace App\Http\Controllers\view\Friend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\FriendServices;

class RequestController extends Controller
{
    protected $friendServices;

    public function __construct(FriendServices $friendServices)
    {
        $this->friendServices = $friendServices;
    }

    public function index(Request $request)
    {
        $id = Auth::id();
        $invitation = $this->friendServices->friendRequest($id);
        return view('layouts.friends.request', ['invitation' => $invitation]);
    }

    public function accept(Request $request)
    {
        $customerId = $request->route('id');
        $id = Auth::id();
        $this->friendServices->acceptFriend($id, $customerId);
        $invitation = $this->friendServices->friendRequest($id);
        return redirect()->route('request-friend', 301)->with('invitation', $invitation);
    }

    public function destroy(Request $request)
    {
        $customerId = $request->route('id');
        $id = Auth::id();
        $this->friendServices->deleteFriendRequest($id, $customerId);
        $invitation = $this->friendServices->friendRequest($id);
        return redirect()->route('request-friend', 301)->with('invitation', $invitation);
    }
}
