<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Friend;

class FriendRepository extends Repository
{
    public function __construct(Friend $friend)
    {
        $this->model = $friend;
    }

    /**
     * add friend
     * $id, $customerId
     * @return \App\Models\Friend
     */
    public function addFriend($id, $customerId)
    {
        return $this->model->insert(['my_ID' => $id,
                                       'customer_ID' => $customerId,
                                       'status' => 0]);
    }

     /**
     * detail friend
     * @param integer $customerId
     * @return \App\Models\Friend
     */
    public function detailFriend($customerId)
    {
        return DB::table('users')->select('users.*')
                    ->where('users.id', '=', $customerId)->get();
    }

     /**
     * display status friend(have not friend)
     * @param integer $id
     * @param integer $customerId
     * @return \App\Models\Friend
     */
    public function statusFriend($id, $customerId)
    {
        $tempJoinTable = "(
        select IF(my_ID=$id, customer_ID, my_ID) as user_id, status 
        from friends where (my_ID = $id and customer_ID = $customerId) or (customer_ID = $id and my_ID = $customerId)
            ) as temp";
            $query =  DB::table('users')->select('users.*')->join(DB::raw($tempJoinTable), function ($join) {
                    $join->on("temp.user_id", "=", "users.id")
                    ->where("temp.status", "=", "0");
            })->get();
        return $query->count();
    }

     /**
     * add friend
     * @param integer $id
     * @param integer $customerId
     * @return \App\Models\Friend
     */
    public function unfriend($id, $customerId)
    {
        return $this->model->where([
                                ['my_ID', '=', $id],
                                ['customer_ID', '=', $customerId],
        ])->orWhere([
            ['my_ID', '=', $customerId],
            ['customer_ID', '=', $id],
        ])->delete();
    }

     /**
     * display status friend(friend)
     * @param integer $id
     * @param integer $customerId
     * @return \App\Models\Friend
     */
    public function checkFriend($id, $customerId)
    {
        $tempJoinTable = "(
        select IF(my_ID=$id, customer_ID, my_ID) as user_id, status 
        from friends where (my_ID = $id and customer_ID = $customerId) or (customer_ID = $id and my_ID = $customerId)
            ) as temp";
            $query =  DB::table('users')->select('users.*')->join(DB::raw($tempJoinTable), function ($join) {
                    $join->on("temp.user_id", "=", "users.id")
                    ->where("temp.status", "=", "1");
            })->get();
        return $query->count();
    }


    /**
     * friend request
     * @param integer $id
     * @return \App\Models\Friend
     */
    public function friendRequest($id)
    {
        return $this->model->join('users', 'friends.my_ID', '=', 'users.id')
                           ->where('friends.customer_ID', '=', $id)
                           ->where('friends.status', '=', 0)->get();
    }

     /**
     * accept friend request
     * @param integer $id
     * @param integer $customerId
     * @return \App\Models\Friend
     */
    public function acceptFriend($id, $customerId)
    {
        return $this->model->where('customer_ID', '=', $id)
                           ->where('my_ID', '=', $customerId)
                           ->where('status', '=', 0)
                           ->update(['status' => 1]);
    }
    
    /**
     * delete friend request
     * @param integer $id
     * @param integer $customerId
     * @return \App\Models\Friend
     */
    public function deleteFriendRequest($id, $customerId)
    {
        return $this->model->where('customer_ID', '=', $id)
                           ->where('my_ID', '=', $customerId)
                           ->where('status', '=', 0)
                           ->delete();
    }
}
