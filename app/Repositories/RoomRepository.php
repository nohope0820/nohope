<?php

namespace App\Repositories;

use App\Models\Room;
use App\Models\RoomMember;

class RoomRepository extends Repository
{
    protected $roomMember;

    public function __construct(Room $room, RoomMember $roomMember)
    {
        $this->model = $room;
        $this->roomMember = $roomMember;
    }

    /**
     * Add member in room
     * @param array $params
     * @return \App\Models\RoomMember
     */
    public function storeMember($params)
    {
        return $this->roomMember->create($params);
    }

    /**
     * Select list room mine
     * @param integer $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list($userId)
    {
        return $this->model->join('room_members', 'rooms.id', '=', 'room_members.room_id')
                           ->select('rooms.id', 'rooms.name')
                           ->where('room_members.customer_id', '=', $userId)->get();
    }
}
