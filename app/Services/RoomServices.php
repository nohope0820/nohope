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
    
    public function createRoom(array $params, $founder)
    {
        // store room
        return $this->roomRepository->store($params, $founder);
    }

    public function informationRoom(array $params, $founder)
    {
        return $this->roomRepository->informationRoom($params, $founder);
    }

    public function listRoom($id)
    {
        return $this->roomRepository->listRoom($id);
    }
}
