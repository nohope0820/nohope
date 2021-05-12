<?php

namespace App\Http\Controllers\view\Room;

use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('layouts.rooms.chat');
    }
}
