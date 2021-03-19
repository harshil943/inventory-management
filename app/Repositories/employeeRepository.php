<?php

namespace App\Repositories;


use App\Models\Designation;
use App\Models\EmployeeDetails;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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

    public function delete($email_id)
    {
        $emp = EmployeeDetails::where('email_id',$email_id)->first();
        // dd($emp->email_id);
        if($emp->admin == '1')
        {
            User::where('email',$email_id)->forcedelete();
        }
        $emp->forcedelete();

        return true;
    }

    public function makeAdmin($id,$request)
    {
        $emp = EmployeeDetails::find($id);
        EmployeeDetails::where('id',$id)->update([
            'admin'=>'1',
        ]);
        
        $user = new User;
        
        $user->name = $emp->employee_name;
        $user->email = $emp->email_id;
        $user->mobile = $emp->mobile_number;
        $user->password = Hash::make($request->password);
        $user->address = $emp->residence_address;
        $user->password_change = '1';
        $user->is_company = '0';
        $user->save();
        $newadmin = User::where('email',$emp->email_id)->first();
        $newadmin->assignRole('admin');

        
        return true;
        
    }

    public function findAdmins()
    {   $admins=array();
        $data = EmployeeDetails::where('admin','1')->get();
        foreach($data as $item)
        {
            array_push($admins,$item->email_id);    
        }
        // dd($data);  
        return $admins;
    }

    public function removeAdmin($email)
    {
        $emp = User::where('email',$email)->first();
        
        $emp->removeRole('admin');

        User::where('email',$email)->forcedelete();
        
        EmployeeDetails::where('email_id',$email)->update([
            'admin'=>'0',
        ]);
        return true;

    }
}
