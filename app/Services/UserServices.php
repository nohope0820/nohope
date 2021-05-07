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
     * display list friend mine
     * $id
     * @return \App\Repositories\UserRepository
     */
    public function listFriend($id)
    {
        return $this->userRepository->listFriend($id);
    }

    /**
     * display detail friend
     * $customerId
     * @return \App\Repositories\UserRepository
     */
    public function detailFriend($customerId)
    {
        return $this->userRepository->detailFriend($customerId);
    }

    /**
     * display status friend(have not friend)
     * $id, $customerId
     * @return \App\Repositories\UserRepository
     */
    public function statusFriend($id, $customerId)
    {
        return $this->userRepository->statusFriend($id, $customerId);
    }

    /**
     * display status friend(friend)
     * $id, $customerId
     * @return \App\Repositories\UserRepository
     */
    public function checkFriend($id, $customerId)
    {
        return $this->userRepository->checkFriend($id, $customerId);
    }

    /**
     * display profile mine
     * $id
     * @return \App\Repositories\UserRepository
     */
    public function profile($id)
    {
        return $this->userRepository->profile($id);
    }

    /**
     * update profile
     * @param array $params
     * $id
     * @return \App\Repositories\UserRepository
     */
    public function updateProfile($id, array $params)
    {
        return $this->userRepository->updateProfile($id, $params);
    }

    /**
     * update profile
     * @param array $params
     * @return \App\Repositories\UserRepository
     */
    public function findUser(array $params)
    {
        return $this->userRepository->findUser($params);
    }
}
