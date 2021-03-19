<?php

namespace App\Repositories\Interfaces;

use App\User;

interface OrderInterface
{
    public function all();

    public function orderFormDetails();

}