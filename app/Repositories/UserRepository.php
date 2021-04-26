<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\User;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function list()
    {
        $id = Auth::id();
        return $this->model->join('friends', 'friends.customer_ID', '=', 'users.id')
            ->select('users.name', 'users.id')
            ->where('friends.my_ID', '=', $id)->get();
    }

    public function detail()
    {
        $customer_id = request()->route('id');
        return $this->model->select('users.*')
                    ->where('users.id', '=', $customer_id)->get();
    }

    public function profile()
    {
        $id = Auth::id();
        return $this->model->select('users.*')
                    ->where('users.id', '=', $id)->get();
    }

    public function updateprofile(array $params)
    {
        $address = $params['address'];
        $gender = $params['gender'];
        $graduate = $params['graduate'];
       
 
        $id = Auth::id();

        return $this->model->where('users.id', '=', $id)
                    ->update(['address' => $address,
                              'gender' => $gender,
                              'graduate' => $graduate]);
    }
}
