<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\OrderInterface;

class ordersController extends Controller
{
    private $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(){
        
        $data = $this->orderRepository->all();
        return view('client.orders')->with('order',$data);
    }

    public function details($data){
        return view('client.orderDetails')->with('order',$data);
    }
}
