<?php

namespace App\Http\Controllers\view;

use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Eloquent\Model\User;

class FindUserController extends Controller
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
    

    public function findFriend()
    {
        return view('layouts.FindFriend');
    }

    public function searchFriendFullText(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);
        $find = $params['find'];
        $query = $this->userServices->findUser($params);
        return view('layouts.ListFindFriend', compact('query'));
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'find' => 'bail|required|min:2|max:100',
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['find']);
    }

    public function resultfindfriend()
    {
        return view('layouts.ListFindFriend');
    }
}
