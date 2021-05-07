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
     * Add friend
     * @param integer $myId
     * @param integer $customerId
     * @return \App\Repositories\FriendRepository
     */
    public function addFriend($myId, $customerId)
    {
        return $this->friendRepository->addFriend($myId, $customerId);
    }

    /**
     * Show status friend(have not friend)
     * @param integer $myId
     * @param integer $customerId
     * @return \App\Repositories\FriendRepository
     */
    public function haveFriend($myId, $customerId)
    {
        return $this->friendRepository->haveFriend($myId, $customerId);
    }

    /**
     * Unfriend
     * @param integer $myId
     * @param integer $customerId
     * @return \App\Repositories\FriendRepository
     */
    public function unFriend($myId, $customerId)
    {
        return $this->friendRepository->unFriend($myId, $customerId);
    }

    /**
     * Show status friend(friend)
     * @param integer $myId
     * @param integer $customerId
     * @return \App\Repositories\FriendRepository
     */
    public function statusOfFriend($myId, $customerId)
    {
        return $this->friendRepository->statusFriend($myId, $customerId);
    }

    /**
     * Show list friend request
     * @param integer $myId
     * @return \App\Repositories\FriendRepository
     */
    public function friendRequest($myId)
    {
        return $this->friendRepository->friendRequest($myId);
    }

    /**
     * Accept friend request
     * @param integer $myId
     * @param integer $customerId
     * @return \App\Repositories\FriendRepository
     */
    public function acceptFriend($myId, $customerId)
    {
        return $this->friendRepository->acceptFriend($myId, $customerId);
    }
    
    /**
     * Delete friend request
     * @param integer $myId
     * @param integer $customerId
     * @return \App\Repositories\FriendRepository
     */
    public function deleteFriendRequest($myId, $customerId)
    {
        return $this->friendRepository->deleteFriendRequest($myId, $customerId);
    }
}
