<?php

namespace App\Repositories\Interfaces;


interface dashboardInterface
{
    public function pendingOrders();

    public function completedOrders();
}