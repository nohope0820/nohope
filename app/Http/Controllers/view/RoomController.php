<?php

namespace App\Http\Controllers\view;

use Illuminate\Support\Facades\Auth;
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
        $room_id = request()->route('id');
        $query = $this->roomServices->inforRoom($room_id);
        return view('layouts.ChatRoom', compact('query'));
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
        $founder = Auth::id();
        $params = $this->getParams($request);
        $query = $this->roomServices->createRoom($founder, $params);
        $room = $this->roomServices->room($founder, $params);
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
