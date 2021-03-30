<?php

namespace App\Repositories\Interfaces;

interface machineInterface

{
    public function addMachine($request);

    public function allMachine();

    public function deleteMachine($id);

    public function machineById($id);

    public function updateMachine($request,$id);
}
