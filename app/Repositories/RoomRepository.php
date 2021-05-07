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
     * @param integer $founder
     * @return \App\Models\Room
     */
    public function store(array $params, $founder)
    {
        $name = $params['name'];
        $query = $this->model->where('name', '=', $name)
                             ->where('founder', '=', $founder)->get();
        $count = $query->count();
        if ($count == 0) {
            return $this->model->insert(['name' => $name,
                                         'founder' => $founder,
                                         'created_at' => date('Y-m-d H:i:s'),
                                         'updated_at' => date('Y-m-d H:i:s')]);
        }
    }

    /**
     * select room_id from rooms with name and founder
     * @param array $params
     * @param integer $founder
     * @return \App\Models\Room
     */
    public function informationRoom(array $params, $founder)
    {
        $name = $params['name'];
        $query = $this->model->where('name', '=', $name)
                             ->where('founder', '=', $founder)->get();
        foreach ($query as $rows) {
            return $rows->id;
        }
    }

    /**
     * select list room mine
     * @param integer $id
     * @return \App\Models\Room
     */
    public function listRoom($id)
    {
        return $this->model->join('room_member', 'rooms.id', '=', 'room_member.room_id')
            ->select('rooms.id', 'rooms.name')
            ->where('room_member.customer_id', '=', $id)->get();
    }
}
