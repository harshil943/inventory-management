<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\designationInterface;
use App\Models\Designation;
use Spatie\Permission\Models\Role;

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

    public function storeDesignation($request)
    {
        $designation = new Designation;
        $designation->designation_name = $request->designation;
        $designation->save();
        Role::create(['name'=>$request->designation]);
    }

}
