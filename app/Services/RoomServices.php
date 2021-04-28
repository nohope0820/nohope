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

    public function createRoom($founder, array $params)
    {
        // store room
        return $this->roomRepository->store($founder, $params);
    }

    public function room($founder, array $params)
    {
        // store room
        return $this->roomRepository->room($founder, $params);
    }

    public function inforRoom($room_id)
    {
        return $this->roomRepository->inforRoom($room_id);
    }

    public function listRoom($id)
    {
        return $this->roomRepository->listRoom($id);
    }
}
