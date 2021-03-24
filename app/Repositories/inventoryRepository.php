<?php

namespace App\Repositories;

use App\Models\InventoryDetails;
use App\Repositories\Interfaces\inventoryInterface;

class inventoryRepository implements inventoryInterface
{
    public function inventoryDetails()
    {
        return InventoryDetails::all();
    }

    public function addInventory($request)
    {
        $inventory = new InventoryDetails;

        $inventory->product_id = $request->product;
        $inventory->quantity = $request->quantity;
        $inventory->cost_per_product = $request->cost;

        $inventory->save();

        return true;
    }

    public function deleteInventory($id)
    {
        InventoryDetails::where('id',$id)->delete();
        return true;
    }

    public function inventoryById($id)
    {
        return InventoryDetails::where('id',$id)->first();
    }

    public function updateInventory($request,$id)
    {
        InventoryDetails::where('id',$id)->update(array(
            'product_id'=>$request->product,
            'quantity'=>$request->quantity,
            'cost_per_product'=>$request->cost,
        ));

        return true;
    }
}
