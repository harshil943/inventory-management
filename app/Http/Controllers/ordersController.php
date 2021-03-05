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
        // $data = DB::table('order_details')->all();
        // return view('client.productDetails')->with('product',$data);
        $data = $this->orderRepository->all();
        return view('client.orders')->with('order',$data);
    }

    public function details($data){
        return view('client.orderDetails')->with('order',$data);
    }
}
