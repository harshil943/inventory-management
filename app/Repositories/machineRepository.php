<?php

namespace App\Repositories;

use App\Models\MachineErrorReportTable;
use App\Repositories\Interfaces\machineInterface;

class machineRepository implements machineInterface
{
    public function addMachine($request)
    {
        $machine = new MachineErrorReportTable;

        $machine->asset_id = $request->asset_name;
        $machine->error_details = $request->error_detail;
        $machine->error_issue_date = $request->issue_date;
        $machine->error_status = $request->error_status;
        $machine->cost = $request->cost;
        $machine->error_solve_date = $request->solved_date;

        $machine->save();

        return true;
    }

    public function allMachine()
    {
        return MachineErrorReportTable::all();
    }

    public function deleteMachine($id)
    {
        MachineErrorReportTable::where('id',$id)->first()->delete();
        return true;
    }

    public function machineById($id)
    {
        return MachineErrorReportTable::where('id',$id)->firstorfail();
    }

    public function updateMachine($request,$id)
    {
        MachineErrorReportTable::where('id',$id)->update(array(
            'asset_id' => $request->asset_name,
            'error_details' => $request->error_detail,
            'error_issue_date' => $request->issue_date,
            'error_solve_date' => $request->solved_date,
            'error_status' => $request->error_status,
            'cost' => $request->cost,
        ));

        return true;
    }
}
