<?php

namespace Database\Seeders;

use App\Models\EmployeeDetails;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Employee Details 1
        $emp1 = new EmployeeDetails();
        $emp1->id = '1';
        $emp1->employee_name = 'Hemal Shah';
        $emp1->email_id = 'hemalshah@gmail.com';
        $emp1->mobile_number = '1234567890';
        $emp1->residence_address = '29 - Shyamli Society, Deri Road, Nadiad - 387002';
        $emp1->bank_name = 'Bandhan Bank';
        $emp1->bank_account_number = '1234567887654321';
        $emp1->bank_IFSC_code = 'BDB0004102';
        $emp1->salary = '12000';
        $emp1->designation_id = '1';

        $emp1->save();
    }
}
