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

    public function index()
    {
        $id = Auth::id();
        $query = $this->userServices->list1($id);
        return view('home', ['query' => $query]);
    }

    public function detailfriend(Request $request)
    {
        $customer_id = $request->route('id');
        $id = Auth::id();
        $query = $this->userServices->detail($customer_id);
        $record1 = $this->userServices->addfriend($id, $customer_id);
        $check = $this->userServices->checkfriend($id, $customer_id);
        return view('layouts.detailfriend', ['query' => $query], ['record1' => $record1])->with('check', $check);
    }

    public function profile()
    {
        $id = Auth::id();
        $query = $this->userServices->profile($id);
        return view('layouts.profile', ['query' => $query]);
    }

    public function repairprofile()
    {
        return view('layouts.repairprofile');
    }

    public function updateprofilePost(Request $request)
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
