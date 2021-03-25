<?php

namespace App\Repositories\Interfaces;

interface assetInterface
{
    public function addAsset($request);

    public function allAsset();

    public function deleteAsset($id);

    public function assetById($id);

    public function updateAsset($request,$id);
}