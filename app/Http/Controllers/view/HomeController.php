<?php

namespace App\Http\Controllers\view;

use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $query = $this->userServices->list();
        return view('home', ['query' => $query]);
    }

    public function findfriend()
    {
        return view('layouts.findfriend');
    }

    public function resultfindfriend()
    {
        return view('layouts.resultsfindfriend');
    }

    public function detailfriend()
    {
        $query = $this->userServices->detail();
        return view('layouts.detailfriend', ['query' => $query]);
    }

    public function profile()
    {
        $query = $this->userServices->profile();
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
        $params = $this->getParams($request);
        $query = $this->userServices->updateprofile($params);
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
}
