<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;
use App\Repositories\RoomRepository;

class RoomServices
{
    protected $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function createRoom(array $params)
    {
        // store room
        return $this->roomRepository->store($params);
    }

    public function room(array $params)
    {
        // store room
        return $this->roomRepository->room($params);
    }

    public function inforRoom()
    {
        return $this->roomRepository->inforRoom();
    }

    public function listRoom()
    {
        return $this->roomRepository->listRoom();
    }
}
