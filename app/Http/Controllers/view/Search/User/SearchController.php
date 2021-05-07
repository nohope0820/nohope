<?php

namespace App\Http\Controllers\view\Search\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\UserServices;
use App\Http\Controllers\Controller;

class SearchController extends Controller
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

    public function main(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);
        $find = $params['find'];
        $query = $this->userServices->findUser($params);
        return view('layouts.friends.list-find', compact('query'));
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

    public function show()
    {
        return view('layouts.friends.list-find');
    }
}
