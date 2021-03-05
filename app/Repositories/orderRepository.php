<?php

namespace App\Repositories;

use App\Models\OrderDetails;
use App\User;
use App\Repositories\Interfaces\OrderInterface;

class orderRepository implements OrderInterface
{
    public function all()
    {
        // return DB::table('order_details')->where('category_id',$id)->get();
        // return DB::table('order_details')->get();
        return OrderDetails::all();
    }

   
}