<?php

namespace App\Http\Controllers\view;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MessagePersonalServices;
use App\Http\Controllers\Controller;

class MessagePersonalController extends Controller
{
    public $messagePersonalServices;

    public function __construct(MessagePersonalServices $messagePersonalServices)
    {
        $this->messagePersonalServices = $messagePersonalServices;
    }
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function message(Request $request)
    {
        $customer_id = $request->route('id');
        $id = Auth::id();
        $this->messagePersonalServices->store($id, $customer_id);
        // $messPers_id = $this->messagePersonalServices->messPers($id, $customer_id);
        $query = $this->messagePersonalServices->infor($id, $customer_id);
        $message = $this->messagePersonalServices->listMessage($id, $customer_id);
        return view('layouts.ContentPersonalMessage', compact('query'), compact('message'));
    }
    public function messagePost(Request $request)
    {
        $id = Auth::id();
        $customer_id = $request->route('id');
        $params = $this->getParams($request);
        $query = $this->messagePersonalServices->infor($id, $customer_id);
        $this->messagePersonalServices->message($params, $id, $customer_id);
        $message = $this->messagePersonalServices->listMessage($id, $customer_id);
        return redirect()->route('message', ['id' => $customer_id])->with(compact('query'), compact('message'));
    }

    private function getParams(Request $request)
    {
        $my_id = Auth::id();
        $customer_id = $request->route('id');
        return $request->only(['message']);
    }
}
