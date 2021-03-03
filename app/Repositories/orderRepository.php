<?php

namespace App\Repositories;

use App\Models\OrderDetails;
use App\User;
use App\Repositories\Interfaces\OrderInterface;

class orderRepository implements OrderInterface
{
    public function all()
    {
        return OrderDetails::all();
    }

   
}