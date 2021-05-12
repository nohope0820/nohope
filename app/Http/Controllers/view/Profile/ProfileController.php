<?php

namespace App\Http\Controllers\view\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Services\UserServices;

class ProfileController extends Controller
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
        $profile = $this->userServices->profile($myId);
        return view('layouts.profile.profile', ['profile' => $profile]);
    }

    public function edit()
    {
        return view('layouts.profile.repair-profile');
    }

    public function update(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $myId = Auth::id();
        $params = $this->getParams($request);
        $query = $this->userServices->updateprofile($myId, $params);
        return redirect()->route('profile.index', 301);
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
