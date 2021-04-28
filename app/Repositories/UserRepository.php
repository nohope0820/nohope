<?php

namespace App\Repositories;

use App\Models\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function friends($id)
    {
        $tempJoinTable = "(
        select IF(my_ID=$id, customer_ID, my_ID) as user_id, status from friends where my_ID = $id or customer_ID = $id
        ) as temp";
        return $this->model->select('users.*')->join(DB::raw($tempJoinTable), function ($join) {
                $join->on("temp.user_id", "=", "users.id")
                ->where("temp.status", "=", "1");
        })->get();
    }
   
    public function detail($customer_id)
    {
        return $this->model->select('users.*')
                    ->where('users.id', '=', $customer_id)->get();
    }

    public function addfriend($id, $customer_id)
    {
        $tempJoinTable = "(
        select IF(my_ID=$id, customer_ID, my_ID) as user_id, status 
        from friends where (my_ID = $id and customer_ID = $customer_id) or (customer_ID = $id and my_ID = $customer_id)
            ) as temp";
            $query =  $this->model->select('users.*')->join(DB::raw($tempJoinTable), function ($join) {
                    $join->on("temp.user_id", "=", "users.id")
                    ->where("temp.status", "=", "0");
            })->get();
        return $query->count();
    }

    public function checkfriend($id, $customer_id)
    {
        $tempJoinTable = "(
        select IF(my_ID=$id, customer_ID, my_ID) as user_id, status 
        from friends where (my_ID = $id and customer_ID = $customer_id) or (customer_ID = $id and my_ID = $customer_id)
                ) as temp";
                $query =  $this->model->select('users.*')->join(DB::raw($tempJoinTable), function ($join) {
                        $join->on("temp.user_id", "=", "users.id")
                        ->where("temp.status", "=", "1");
                })->get();
        return $query->count();
    }

    public function profile($id)
    {
        return $this->model->select('users.*')
                    ->where('users.id', '=', $id)->get();
    }

    public function updateprofile($id, array $params)
    {
        $address = $params['address'];
        $gender = $params['gender'];
        $graduate = $params['graduate'];
      
        return $this->model->where('users.id', '=', $id)
                    ->update(['address' => $address,
                              'gender' => $gender,
                              'graduate' => $graduate]);
    }

    public function findUser(array $params)
    {
        $find = $params['find'];
        return  $this->model->whereRaw("MATCH(name)AGAINST('.$find.' IN NATURAL LANGUAGE MODE)")->get();
    }
}
