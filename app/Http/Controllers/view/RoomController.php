<?php

namespace App\Http\Controllers\view;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Services\RoomServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    protected $roomServices;

    public function __construct(RoomServices $roomServices)
    {
        $this->roomServices = $roomServices;
    }
    
    public function createRoom()
    {
        return view('layouts.CreateRoom');
    }

    public function addMemberForRoom()
    {
        return view('layouts.AddMemberRoom');
    }

    public function chatRoom()
    {
        return view('layouts.ChatRoom');
    }

    public function listRoom()
    {
        $id = Auth::id();
        $query = $this->roomServices->listRoom($id);
        return view('layouts.ListRoom', compact('query'));
    }

    public function createRoomPost(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);
        // $params['founder'] = Auth::id();
        // $fouder = $params['founder'];
        $founder = Auth::id();
        // $query = $this->roomServices->createRoom($founder, $params);
        $this->roomServices->createRoom($params, $founder);
        $room_id = $this->roomServices->informationRoom($params, $founder);
        return redirect(url('/room='.$room_id));
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'bail|required|min:6|max:100',
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['name']);
    }
}
