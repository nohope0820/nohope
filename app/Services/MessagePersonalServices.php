<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;
use App\Repositories\MessagePersonalRepository;

class MessagePersonalServices
{
    protected $messagePersonalRepository;

    public function __construct(MessagePersonalRepository $messagePersonalRepository)
    {
        $this->messagePersonalRepository = $messagePersonalRepository;
    }

    public function store($id, $customer_id)
    {
        return $this->messagePersonalRepository->store($id, $customer_id);
    }

    public function messPers($id, $customer_id)
    {
        return $this->messagePersonalRepository->messPers($id, $customer_id);
    }

    public function infor($id, $customer_id)
    {
        return $this->messagePersonalRepository->infor($id, $customer_id);
    }

    public function message(array $params, $id, $customer_id)
    {
        return $this->messagePersonalRepository->message($params, $id, $customer_id);
    }

    public function listMessage($id, $customer_id)
    {
        return $this->messagePersonalRepository->listMessage($id, $customer_id);
    }
}
