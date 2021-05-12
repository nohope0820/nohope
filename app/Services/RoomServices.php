<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repositories\RoomRepository;

class RoomServices
{
    protected $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }
    
    /**
     * Create rooms and add member
     * @param array $params
     * @return \App\Models\Room
     */
    public function store(array $params)
    {
        $params['founder'] = Auth::id();
        $room = $this->roomRepository->store($params);
        $this->roomRepository->storeMember([
            'room_id' => $room->id,
            'customer_id' => Auth::id()
        ]);
        return $room;
    }

     /**
     * Show list room
     * @return \App\Repositories\RoomRepository
     */
    public function list($userId = null)
    {
        $userId = Auth::id();
        return $this->roomRepository->list($userId);
    }
}
