<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function index(){
        return view('client.orders');
    }

    public function details($data){
        return view('client.orderDetails')->with('order',$data);
    }
}
