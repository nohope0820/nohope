<?php

namespace App\Http\Controllers\view\Room;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\RoomServices;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    protected $roomServices;

    public function __construct(RoomServices $roomServices)
    {
        $this->roomServices = $roomServices;
    }

    public function index()
    {
        $userId = Auth::id();
        $rooms = $this->roomServices->list($userId);
        return view('layouts.rooms.list', ['rooms' => $rooms]);
    }
}
