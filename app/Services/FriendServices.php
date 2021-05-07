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

    /**
     * add friend
     * $id
     * @return \App\Repositories\FriendRepository
     */
    public function addFriend($id, $customerId)
    {
        return $this->friendRepository->addFriend($id, $customerId);
    }

    /**
     *detail friend
     * $id
     * @return \App\Repositories\FriendRepository
     */
    public function detailFriend($customerId)
    {
        return $this->friendRepository->detailFriend($customerId);
    }

    /**
     *display status friend(have not friend)
     * $id
     * @return \App\Repositories\FriendRepository
     */
    public function statusFriend($id, $customerId)
    {
        return $this->friendRepository->statusFriend($id, $customerId);
    }

    /**
     * unfriend
     * $id, $customerId
     * @return \App\Repositories\FriendRepository
     */
    public function unfriend($id, $customerId)
    {
        return $this->friendRepository->unFriend($id, $customerId);
    }

    /**
     * display status friend(friend)
     * $id, $customerId
     * @return \App\Repositories\FriendRepository
     */
    public function checkfriend($id, $customerId)
    {
        return $this->friendRepository->checkfriend($id, $customerId);
    }

    
    public function friendRequest($id)
    {
        return $this->friendRepository->friendRequest($id);
    }

    public function acceptFriend($id, $customerId)
    {
        return $this->friendRepository->acceptFriend($id, $customerId);
    }
    
    public function deleteFriendRequest($id, $customerId)
    {
        return $this->friendRepository->deleteFriendRequest($id, $customerId);
    }
}
