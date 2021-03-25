<?php

namespace App\Repositories\Interfaces;

interface rawmaterialInterface
{
    public function addMaterial($request);

    public function allRawmaterial();

    public function materialById($id);

    public function updateMaterial($request,$id);

    public function deleteMaterial($id);
}