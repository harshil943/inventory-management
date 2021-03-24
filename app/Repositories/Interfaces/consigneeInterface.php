<?php

namespace App\Repositories\Interfaces;



interface consigneeInterface
{
    public function allConsignee();

    public function deleteConsignee($id);

    public function addConsignee($request);

    public function consigneeById($id);

    public function updateConsignee($request,$id);
}