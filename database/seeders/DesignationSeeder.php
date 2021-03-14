<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Designation Entry 1
        $des1 = new Designation();
        $des1->id = '1';
        $des1->designation_name = 'Admin';
        $des1->access = 'allAccess';

        //Designation Entry 2
        $des2 = new Designation();
        $des2->id = '2';
        $des2->designation_name = 'Worker';
        $des2->access = 'access';

        $des1->save();
        $des2->save();
    }
}
