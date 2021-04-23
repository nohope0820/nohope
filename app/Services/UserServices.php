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

    public function list()
    {
        return $this->userRepository->list();
    }

    public function detail()
    {
        return $this->userRepository->detail();
    }

    public function profile()
    {
        return $this->userRepository->profile();
    }

    public function updateprofile(array $params)
    {
        return $this->userRepository->updateprofile($params);
    }
}
