<?php

namespace App\Http\Controllers\view;

use Illuminate\Support\Facades\Auth;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;

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

    public function homeView()
    {
        $id = Auth::id();
        $query = $this->userServices->listFriend($id);
        return view('home', ['query' => $query]);
    }

    public function detailFriend(Request $request)
    {
        $customerId = $request->route('id');
        $id = Auth::id();
        $query = $this->userServices->detailFriend($customerId);
        $status = $this->userServices->statusFriend($id, $customerId);
        $check = $this->userServices->checkFriend($id, $customerId);
        return view('layouts.detailfriend', ['query' => $query], ['record1' => $status])->with('check', $check);
    }

    public function profile()
    {
        $id = Auth::id();
        $query = $this->userServices->profile($id);
        return view('layouts.profile', ['query' => $query]);
    }

    public function repairProfile()
    {
        return view('layouts.RepairProfile');
    }

    public function updateProfilePost(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $id = Auth::id();
        $params = $this->getParams($request);
        $query = $this->userServices->updateprofile($id, $params);
        return redirect()->route('profile');
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'address' => 'bail|required|min:5|max:100',
            'gender' => 'bail|required|min:2|max:20',
            'graduate' => 'bail|required|min:10|max:100',
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['address', 'gender', 'graduate']);
    }

    public function addMemberForRoom()
    {
        return view('layouts.AddMemberRoom');
    }
}
