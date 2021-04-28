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

    public function list1($id)
    {
        return $this->userRepository->friends($id);
    }

    // public function list2($id)
    // {
    //     return $this->userRepository->list2($id);
    // }

    public function detail($customer_id)
    {
        return $this->userRepository->detail($customer_id);
    }

    public function addfriend($id, $customer_id)
    {
        return $this->userRepository->addfriend($id, $customer_id);
    }

    public function checkfriend($id, $customer_id)
    {
        return $this->userRepository->checkfriend($id, $customer_id);
    }

    public function profile($id)
    {
        return $this->userRepository->profile($id);
    }

    public function updateprofile($id, array $params)
    {
        return $this->userRepository->updateprofile($id, $params);
    }

    public function findUser(array $params)
    {
        return $this->userRepository->findUser($params);
    }
}
