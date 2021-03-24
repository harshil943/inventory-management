<?php

namespace App\Repositories;

use App\Models\map_order_challan;
use App\Repositories\Interfaces\dashboardInterface;

class dashboardRepository implements dashboardInterface
{
    public function pendingOrders()
    {
        return map_order_challan::where('order_status','pending')->count();
    }

    public function completedOrders()
    {
        return map_order_challan::where('order_status','completed')->count();
    }
}