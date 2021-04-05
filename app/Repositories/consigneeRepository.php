<?php

namespace App\Repositories;

use App\Models\consignee;
use App\Models\map_order_challan;
use App\Repositories\Interfaces\consigneeInterface;

class consigneeRepository implements consigneeInterface
{
    public function allConsignee()
    {
        return consignee::all();
    }

    public function deleteConsignee($id)
    {
        map_order_challan::where('consignee_id',$id)->update(array('consignee_id'=>null));
        consignee::where('id',$id)->forcedelete();
        return true;
    }

    public function addConsignee($request)
    {
        $con = new consignee;

        $con->name = $request->consignee_name;
        $con->email = $request->email;
        $con->address = $request->address;
        $con->gst_number = $request->gst;
        $con->state_code = $request->state_code;
        $con->number = $request->number;

        $con->save();
        return true;
    }

    public function consigneeById($id)
    {
        return consignee::where('id',$id)->firstorfail();
    }

    public function updateConsignee($request,$id)
    {
        consignee::where('id',$id)->update(array(
            'name' => $request->consignee_name,
            'email' => $request->email,
            'gst_number' => $request->gst,
            'number' => $request->number,
            'state_code' => $request->state_code,
            'address' => $request->address,
        ));

        return true;
    }
}
