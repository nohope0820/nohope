<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;
use App\Repositories\UserRepository;

class UserServices
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Show list friend mine
     * @param integer $id
     * @return \App\Repositories\UserRepository
     */
    public function listFriend($myId)
    {
        return $this->userRepository->listFriend($myId);
    }

    /**
     * Show detail friend
     * @param integer $customerId
     * @return \App\Repositories\UserRepository
     */
    public function detailOfFriend($customerId)
    {
        return $this->userRepository->detailFriend($customerId);
    }

    /**
     * Show profile mine
     * @param integer $myId
     * @return \App\Repositories\UserRepository
     */
    public function profile($myId)
    {
        return $this->userRepository->profile($myId);
    }

    /**
     * Update profile
     * @param array $params
     * @param integer $myId
     * @return \App\Repositories\UserRepository
     */
    public function updateProfile($myId, array $params)
    {
        return $this->userRepository->updateProfile($myId, $params);
    }

    /**
     * Search user
     * @param array $params
     * @return \App\Repositories\UserRepository
     */
    public function findUser(array $params)
    {
        $find = $params['find'];
        return $this->userRepository->findUser($find);
    }
}
