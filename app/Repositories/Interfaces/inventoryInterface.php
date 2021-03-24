<?php

namespace App\Repositories\Interfaces;


interface inventoryInterface
{
    public function inventoryDetails();

    public function addInventory($request);

    public function deleteInventory($id);

    public function inventoryById($id);

    public function updateInventory($request,$id);
}