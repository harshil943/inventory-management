<?php

namespace Database\Seeders;

use App\Models\consignee;
use Illuminate\Database\Seeder;

class ConsigneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Consignee Details 1
        $con1 = new consignee();
        $con1->id = '1';
        $con1->name = 'Lubz Corporation (India)';
        $con1->number = '1234567890';
        $con1->gst_number = '27AAAFT0975B1ZF';
        $con1->state_code = 'Maharashtra - 27';
        $con1->address = 'Gala No.14/15, Jai Jalaram Complex, Survey No.36,Hissa No.1,2,3,4, At Village - Pimplas, Ta-Bhiwandi,Dist - Thane';

        //Consignee Details 1
        $con2 = new consignee();
        $con2->id = '2';
        $con2->name = 'Margosa Corporation (India)';
        $con2->number = '1234567890';
        $con2->gst_number = '27AAAFT0975B1ZF';
        $con2->state_code = 'Gujarat - 24';
        $con2->address = 'Gala No.14/15, Jai Jalaram Complex, Survey No.36,Hissa No.1,2,3,4, At Village - Pimplas, Ta-Bhiwandi,Dist - Thane';

        $con1->save();
        $con2->save();
    }
}
