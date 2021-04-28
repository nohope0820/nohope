<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;
use App\Repositories\FriendRepository;

class FriendServices
{
    protected $friendRepository;

    public function __construct(FriendRepository $friendRepository)
    {
        $this->friendRepository = $friendRepository;
    }

    public function addFriend1($id, $customer_id)
    {
        return $this->friendRepository->addFriend1($id, $customer_id);
    }

    public function detail($customer_id)
    {
        return $this->friendRepository->detail($customer_id);
    }

    public function addfriend($id, $customer_id)
    {
        return $this->friendRepository->addfriend($id, $customer_id);
    }

    public function unFriend($id, $customer_id)
    {
        return $this->friendRepository->unFriend($id, $customer_id);
    }

    public function checkfriend($id, $customer_id)
    {
        return $this->friendRepository->checkfriend($id, $customer_id);
    }

    
    public function friendRequest($id)
    {
        return $this->friendRepository->friendRequest($id);
    }

    public function acceptFriend($id, $customer_id)
    {
        return $this->friendRepository->acceptFriend($id, $customer_id);
    }
    
    public function deleteFriendRequest($id, $customer_id)
    {
        return $this->friendRepository->deleteFriendRequest($id, $customer_id);
    }
}
