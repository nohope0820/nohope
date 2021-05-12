<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Friend;

class FriendRepository extends Repository
{
    public function __construct(Friend $friend)
    {
        $this->model = $friend;
    }

    /**
     * Add friend
     * @param array $myId
     * @param array $customerId
     * @return \App\Models\Friend
     */
    public function addFriend($myId, $customerId)
    {
        return $this->model->insert(['my_ID' => $myId,
                                     'customer_ID' => $customerId,
                                     'status' => 0]);
    }
    
     /**
     * Un friend
     * @param array $myId
     * @param array $customerId
     * @return \App\Models\Friend
     */
    public function unFriend($myId, $customerId)
    {
        return $this->model->where(['my_ID' => $myId,
                                    'customer_ID' => $customerId])
                            ->orWhere(['my_ID' => $customerId,
                                       'customer_ID' => $myId])->delete();
    }

     /**
     * Show status friend(have not friend)
     * @param array $myId
     * @param array $customerId
     * @return integer
     */
    public function haveFriend($myId, $customerId)
    {
        $query =  $this->model->where(['my_ID' => $myId,
                                       'customer_ID' => $customerId])
                              ->orWhere(['my_ID' => $customerId,
                                         'customer_ID' => $myId])->get();
        return $query->count();
    }

     /**
     * Show status friend(friend)
     * @param integer $myId
     * @param integer $customerId
     * @return integer status
     */
    public function statusFriend($myId, $customerId)
    {
        $query =  $this->model->where(['my_ID' => $myId,
                                       'customer_ID' => $customerId])
                              ->orWhere(['my_ID' => $customerId,
                                         'customer_ID' => $myId])->get();
        foreach ($query as $rows) {
            return $rows->status;
        }
    }

    /**
     * Friend request
     * @param integer $myId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function friendRequest($myId)
    {
        return $this->model->join('users', 'friends.my_ID', '=', 'users.id')
                           ->where(['customer_ID' => $myId,
                                    'status' => 0])
                           ->select('users.name', 'users.id')
                           ->get();
    }

     /**
     * Accept friend request
     * @param integer $myId
     * @param integer $customerId
     * @return \App\Models\Friend
     */
    public function acceptFriend($myId, $customerId)
    {
        return $this->model->where(['customer_ID' => $myId,
                                    'my_ID' => $customerId,
                                    'status' => 0])
                           ->update(['status' => 1]);
    }
    
    /**
     * Delete friend request
     * @param integer $myId
     * @param integer $customerId
     * @return \App\Models\Friend
     */
    public function deleteFriendRequest($myId, $customerId)
    {
        return $this->model->where(['customer_ID' => $myId,
                                    'my_ID' => $customerId,
                                    'status' => 0])->delete();
    }
}
