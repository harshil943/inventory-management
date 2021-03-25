<?php

namespace App\Repositories;

use App\Models\AssetDetailsTable;
use App\Repositories\Interfaces\assetInterface;

class assetRepository implements assetInterface
{
    public function addAsset($request)
    {
        $asset = new AssetDetailsTable;

        $asset->asset_name = $request->asset_name;
        $asset->purchase_date = $request->purchase_date;
        $asset->selling_date = $request->selling_date;
        $asset->asset_amount = $request->asset_amount;
        $asset->save();

        return true;
    }

    public function allAsset()
    {
        return AssetDetailsTable::all();
    }

    public function deleteAsset($id)
    {
        AssetDetailsTable::where('id',$id)->delete();
        return true;
    }

    public function assetById($id)
    {
        return AssetDetailsTable::where('id',$id)->first();
    }

    public function updateAsset($request,$id)
    {
        AssetDetailsTable::where('id',$id)->update(array(
            'asset_name' => $request->asset_name,
            'asset_amount' => $request->asset_amount,
            'purchase_date' => $request->purchase_date,
            'selling_date' => $request->selling_date,
        ));

        return true;
    }
}