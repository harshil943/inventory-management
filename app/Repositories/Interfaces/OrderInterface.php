<?php

namespace App\Repositories\Interfaces;

use App\User;

interface OrderInterface
{
    public function all();

    public function buyerDetails();

    public function consigneeDetails();

    public function productDetails();

    public function orderCreate($requset);

    public function orderDelete($id);

    public function challanDelete($id);

    public function paymentComplete($id);
}