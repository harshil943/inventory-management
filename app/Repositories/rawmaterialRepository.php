<?php

namespace App\Repositories;

use App\Models\RawMaterialPurchaseDetails;
use App\Repositories\Interfaces\rawmaterialInterface;

class rawmaterialRepository implements rawmaterialInterface
{
    public function addMaterial($request)
    {
       $raw = new RawMaterialPurchaseDetails;

       $raw->material_name = $request->material_name;
       $raw->quantity = $request->quantity;
       $raw->cost_per_quantity = $request->cost;
       $raw->save();

       return true;
    }

    public function allRawmaterial()
    {
        return RawMaterialPurchaseDetails::all();
    }

    public function materialById($id)
    {
        return RawMaterialPurchaseDetails::where('id',$id)->firstorfail();
    }

    public function updateMaterial($request,$id)
    {
        RawMaterialPurchaseDetails::where('id',$id)->update(array(
            'material_name'=>$request->material_name,
            'quantity'=>$request->quantity,
            'cost_per_quantity'=>$request->cost
        ));

        return true;
    }

    public function deleteMaterial($id)
    {
        RawMaterialPurchaseDetails::where('id',$id)->delete();
        return true;
    }
}
