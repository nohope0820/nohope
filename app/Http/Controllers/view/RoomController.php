<?php

namespace App\Http\Controllers\view;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Services\RoomServices;
use App\Http\Controllers\Controller;

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

    public function chatroom()
    {
        $query = $this->roomServices->inforRoom();
        return view('layouts.ChatRoom', compact('query'));
    }

    public function listRoom()
    {
        $query = $this->roomServices->listRoom();
        return view('layouts.ListRoom', compact('query'));
    }

    public function createRoomPost(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);
        $query = $this->roomServices->createRoom($params);
        $room = $this->roomServices->room($params);
        $room_id = $room->id;
        return redirect(url('/room='.$room_id));
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'bail|required|min:6|max:100|unique:rooms,name',
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['name']);
    }
}
