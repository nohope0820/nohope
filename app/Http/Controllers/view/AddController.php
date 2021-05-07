<?php

namespace App\Http\Controllers\view;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Services\FriendServices;
use App\Http\Controllers\Controller;

class AddController extends Controller
{
    protected $friendServices;

    public function __construct(FriendServices $friendServices)
    {
        $this->friendServices = $friendServices;
    }

    public function addFriend(Request $request)
    {
        $customerId = $request->route('id');
        $id = Auth::id();
        $this->friendServices->addFriend($id, $customerId);
        $query = $this->friendServices->detailFriend($customerId);
        $status = $this->friendServices->statusFriend($id, $customerId);
        $check = $this->friendServices->checkFriend($id, $customerId);
        return view('layouts.DetailFriend', ['query' => $query], ['record1' => $status])->with('check', $check);
    }

    public function unFriend(Request $request)
    {
        $customerId = $request->route('id');
        $id = Auth::id();
        $this->friendServices->unFriend($id, $customerId);
        $query = $this->friendServices->detailFriend($customerId);
        $status = $this->friendServices->statusFriend($id, $customerId);
        $check = $this->friendServices->checkFriend($id, $customerId);
        return view('layouts.DetailFriend', ['query' => $query], ['record1' => $status])->with('check', $check);
    }

    public function friendRequest(Request $request)
    {
        $id = Auth::id();
        $query = $this->friendServices->friendRequest($id);
        return view('layouts.FriendRequest', ['query' => $query]);
    }

    public function acceptFriend(Request $request)
    {
        $customerId = $request->route('id');
        $id = Auth::id();
        $this->friendServices->acceptFriend($id, $customerId);
        $query = $this->friendServices->friendRequest($id);
        return redirect()->route('friendRequest')->with('query', $query);
    }

    public function deleteFriendRequest(Request $request)
    {
        $customerId = $request->route('id');
        $id = Auth::id();
        $this->friendServices->deleteFriendRequest($id, $customerId);
        $query = $this->friendServices->friendRequest($id);
        return redirect()->route('friendRequest')->with('query', $query);
    }
}
