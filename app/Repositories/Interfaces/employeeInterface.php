<?php

namespace App\Repositories\Interfaces;

interface employeeInterface
{
    public function all();

    public function empById($id);

    public function storeEmp($request);

    public function updateEmp($id,$request);

    public function delete($id);

    public function makeAdmin($id,$request);

    public function findAdmins();

    public function removeAdmin($email);
}
