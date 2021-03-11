<?php

namespace App\Repositories;


use App\Models\Designation;
use App\Models\EmployeeDetails;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Repositories\Interfaces\employeeInterface;

class employeeRepository implements employeeInterface
{
    public function all()
    {
        $employees = EmployeeDetails::all();
        return $employees;
    }

    public function empById($id)
    {
        $employee = EmployeeDetails::find($id);
        return $employee;
    }

    public function storeEmp($request)
    {
        $emp = new EmployeeDetails;
        $emp->employee_name = $request->name;
        $emp->email_id = $request->email;
        $emp->mobile_number = $request->mobile;
        $emp->residence_address = $request->residence_add;
        $emp->bank_name = $request->bank_name;
        $emp->bank_account_number = $request->bank_account_number;
        $emp->bank_IFSC_code = $request->bank_IFSC_code;
        $emp->salary = $request->salary;
        $emp->designation = $request->designation;

        $emp->save();
        return true;
    }

    public function updateEmp($id,$request)
    {
        // return dd($request->all());
        EmployeeDetails::where('id',$id)
            ->update(array(
                'employee_name' => $request->name,
                'email_id'=>$request->email,
                'mobile_number'=>$request->mobile,
                'residence_address'=>$request->residence_add,
                'bank_name'=>$request->bank_name,
                'bank_account_number'=>$request->bank_account_number,
                'bank_IFSC_code'=>$request->bank_IFSC_code,
                'salary'=>$request->salary,
                'designation'=>$request->designation,
            ));
            return true;
    }

    public function delete($id)
    {
        $employee = EmployeeDetails::findorfail($id);
        $employee->delete();

        return true;
    }

    public function makeAdmin($id,$request)
    {
        $emp = EmployeeDetails::find($id);

        // user table
        $user = new User;
        
        $user->name = $emp->employee_name;
        $user->email = $emp->email_id;
        $user->mobile = $emp->mobile_number;
        $user->password = Hash::make($request->password);
        $user->address = $emp->residence_address;

        $user->save();

        $newadmin = User::where('email',$emp->email_id)->first();
        $newadmin->assignRole('admin');
        return true;
        
    }
}
