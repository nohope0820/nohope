<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Show list friend mine
     * @param integer $myId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listFriend($myId)
    {
        $tempJoinTable = "(
        select IF(my_ID=$myId, customer_ID, my_ID) as user_id, status from friends 
        where my_ID = $myId or customer_ID = $myId
        ) as temp";
        return $this->model->select('users.*')->join(DB::raw($tempJoinTable), function ($join) {
                $join->on("temp.user_id", "=", "users.id")
                ->where("temp.status", "=", "1");
        })->get();
    }
   
    /**
     * Show detail friend
     * @param integer customerId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function detailFriend($customerId)
    {
        return $this->model->where('id', '=', $customerId)->get();
    }

    /**
     * Show profile mine
     * @param integer $myId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function profile($myId)
    {
        return $this->model->where('id', '=', $myId)->get();
    }

    /**
     * Update profile mine
     * @param array $params
     * @param integer $myId
     * @return \App\Models\User
     */
    public function updateProfile($myId, array $params)
    {
        return $this->model->where('id', '=', $myId)->update($params);
    }

    /**
     * Search users
     * @param string $find
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findUser($find)
    {
        return  $this->model->whereRaw("MATCH(name)AGAINST('.$find.' IN NATURAL LANGUAGE MODE)")->get();
    }
}
