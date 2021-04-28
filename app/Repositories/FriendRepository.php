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
    public function addFriend1($id, $customer_id)
    {
        return $this->model->insert(['my_ID' => $id,
                                       'customer_ID' => $customer_id,
                                       'status' => 0]);
    }

    public function detail($customer_id)
    {
        return DB::table('users')->select('users.*')
                    ->where('users.id', '=', $customer_id)->get();
    }

    public function addfriend($id, $customer_id)
    {
        $query = $this->model->join('users', 'friends.customer_ID', '=', 'users.id')
                           ->where('friends.customer_ID', '=', $customer_id)
                           ->where('friends.my_ID', '=', $id)
                           ->where('friends.status', '=', 0)->get();
        return $query->count();
    }

    public function unfriend($id, $customer_id)
    {
        return $this->model->where([
                                ['my_ID', '=', $id],
                                ['customer_ID', '=', $customer_id],
        ])->orWhere([
            ['my_ID', '=', $customer_id],
            ['customer_ID', '=', $id],
        ])->delete();
    }
    
    public function checkfriend($id, $customer_id)
    {
        $query = $this->model->join('users', 'friends.customer_ID', '=', 'users.id')
                           ->where('friends.customer_ID', '=', $customer_id)
                           ->where('friends.my_ID', '=', $id)
                           ->where('friends.status', '=', 1)
                           ->get();
        return $query->count();
    }


    public function friendRequest($id)
    {
        return $this->model->join('users', 'friends.my_ID', '=', 'users.id')
                           ->where('friends.customer_ID', '=', $id)
                           ->where('friends.status', '=', 0)->get();
    }

    public function acceptFriend($id, $customer_id)
    {
        return $this->model->where('customer_ID', '=', $id)
                           ->where('my_ID', '=', $customer_id)
                           ->where('status', '=', 0)
                           ->update(['status' => 1]);
    }
    
    public function deleteFriendRequest($id, $customer_id)
    {
        return $this->model->where('customer_ID', '=', $id)
                           ->where('my_ID', '=', $customer_id)
                           ->where('status', '=', 0)
                           ->delete();
    }
}
