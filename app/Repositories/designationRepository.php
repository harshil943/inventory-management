<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\designationInterface;
use App\Models\Designation;

class designationRepository implements designationInterface
{
    public function all()
    {
        $designation = Designation::all();

        return $designation;
    }

    public function delete($id)
    {
        $designation = Designation::findorfail($id);
        $designation->delete();
        return true;
    }

}
