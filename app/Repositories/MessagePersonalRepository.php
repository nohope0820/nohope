<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MessagePersonal;

class MessagePersonalRepository extends Repository
{
    public function __construct(MessagePersonal $messagePersonal)
    {
        $this->model = $messagePersonal;
    }

    public function store($id, $customer_id)
    {
        $query = $this->model->where([
                                    ['my_ID', '=', $id],
                                    ['customer_ID', '=', $customer_id],
                            ])->orWhere([
                                    ['my_ID', '=', $customer_id],
                                    ['customer_ID', '=', $id],
                            ])->get();
        $check = $query->count();
        if ($check == 0) {
            return $this->model->insert(['my_id' => $id,
                                         'customer_id' => $customer_id]);
        }
    }

    public function messPers($id, $customer_id)
    {
        $messPers = $this->model->select('id')
                             ->where([
                                    ['my_ID', '=', $id],
                                    ['customer_ID', '=', $customer_id],
                            ])->orWhere([
                                    ['my_ID', '=', $customer_id],
                                    ['customer_ID', '=', $id],
                            ])->get();

        foreach ($messPers as $key) {
            $result = $key->id;
        }
        return $result;
    }

    public function infor($id, $customer_id)
    {

        $tempJoinTable = "(
        select IF(my_id=$id, customer_id, my_id) as user_id from message_personals 
        where my_id = $id or customer_id = $id) as temp";
            return DB::table('users')->select('users.name')->where('users.id', '=', $customer_id)
                ->join(DB::raw($tempJoinTable), function ($join) {
                    $join->on("temp.user_id", "=", "users.id");
                })->get();
    }

    public function message(array $params, $id, $customer_id)
    {
        return DB::table("content_message_personal")->insert(['messages' => $params['message'],
                                                              'my_id' => $id,
                                                              'customer_id' => $customer_id,
                                                              'created_at' => date('Y-m-d H:i:s'),
                                                              'updated_at' => date('Y-m-d H:i:s')]);
    }

    public function listMessage($id, $customer_id)
    {
        return DB::table("content_message_personal")->where([
            ['my_ID', '=', $id],
            ['customer_ID', '=', $customer_id],
        ])->orWhere([
            ['my_ID', '=', $customer_id],
            ['customer_ID', '=', $id],
        ])->get();
    }
}
