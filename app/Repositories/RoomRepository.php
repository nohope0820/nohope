<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\Room;

class RoomRepository extends Repository
{
    public function __construct(Room $room)
    {
        $this->model = $room;
    }

    /**
     * Create a room
     * @param array $params
     * @return \App\Models\Room
     */
    public function store(array $params)
    {
        return $this->model->create($params);
    }

    public function room($founder, array $params)
    {
        $name = $params['name'];
        return $this->model->where('name', '=', $name)
                           ->where('founder', '=', $founder)
                           ->orderBy('id', 'DESC')
                           ->select('id', 'name')->first();
    }

    public function inforRoom($room_id)
    {
        return $this->model->where('id', '=', $room_id)->get();
    }

    public function listRoom($id)
    {
        return $this->model->join('room_member', 'rooms.id', '=', 'room_member.room_id')
            ->select('rooms.id', 'rooms.name')
            ->where('room_member.customer_id', '=', $id)->get();
    }
}
