<?php

namespace App\Http\Controllers\view\Room;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Services\RoomServices;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    protected $roomServices;

    public function __construct(RoomServices $roomServices)
    {
        $this->roomServices = $roomServices;
    }

    public function index()
    {
        return view('layouts.rooms.create');
    }

    public function store(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);
        $room = $this->roomServices->store($params);
        return redirect(url("/room=$room->id"));
    }

    private function getValidator(Request $request)
    {
        $rawParams = $request->all();
        $rawParams['founder'] = Auth::id();
        return Validator::make($rawParams, [
            'name' => ['bail','required','min:6','max:255',
                Rule::unique('rooms')->where('name', $rawParams['name'])
                    ->where('founder', $rawParams['founder'])
            ]
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['name']);
    }
}
