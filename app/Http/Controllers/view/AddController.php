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

    public function addfriend(Request $request)
    {
        $customer_id = request()->route('id');
        $id = Auth::id();
        $this->friendServices->addFriend1($id, $customer_id);
        $query = $this->friendServices->detail($customer_id);
        $record1 = $this->friendServices->addfriend($id, $customer_id);
        $check = $this->friendServices->checkfriend($id, $customer_id);
        return view('layouts.detailfriend', ['query' => $query], ['record1' => $record1])->with('check', $check);
        route('profile', ['id' => 1])
    }

    public function unfriend(Request $request)
    {
        $customer_id = request()->route('id');
        $id = Auth::id();
        $this->friendServices->unFriend($id, $customer_id);
        $query = $this->friendServices->detail($customer_id);
        $record1 = $this->friendServices->addfriend($id, $customer_id);
        $check = $this->friendServices->checkfriend($id, $customer_id);
        return view('layouts.detailfriend', ['query' => $query], ['record1' => $record1])->with('check', $check);
    }

    public function friendRequest(Request $request)
    {
        $id = Auth::id();
        $query = $this->friendServices->friendRequest($id);
        return view('layouts.FriendRequest', ['query' => $query]);
    }

    public function acceptFriend(Request $request)
    {
        $customer_id = request()->route('id');
        $id = Auth::id();
        $this->friendServices->acceptFriend($id, $customer_id);
        $query = $this->friendServices->friendRequest($id);
        return redirect()->route('friendRequest')->with('query', $query);
    }

    public function deleteFriendRequest(Request $request)
    {
        $customer_id = request()->route('id');
        $id = Auth::id();
        $this->friendServices->deleteFriendRequest($id, $customer_id);
        $query = $this->friendServices->friendRequest($id);
        return redirect()->route('friendRequest')->with('query', $query);
    }
}
