<?php

namespace Database\Seeders;

use App\Models\challan;
use Illuminate\Database\Seeder;

class ChallanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Challan Details 1
        $challan1 = new challan();
        $challan1->id = '1';
        $challan1->total_no_packages = '55';
        $challan1->product_id = '[1,2,3]';
        $challan1->other = '["MS",["RED","BLACK"],"RED"]';
        $challan1->bundle = '[10,[15,10],20]';
        $challan1->pack_size = '[1000,[136,18],200]';
        $challan1->extra_note = 'Inner small - 5000 (with value) & Mono Cap - 150 (Free) include in above detail';

        //Challan Details 2
        $challan2 = new challan();
        $challan2->id = '2';
        $challan2->total_no_packages = '25';
        $challan2->product_id = '[1]';
        $challan2->other = '["RED","BLACK"]';
        $challan2->bundle = '[15,10]';
        $challan2->pack_size = '[136,18]';
        $challan2->extra_note = NULL;

        $challan1->save();
        $challan2->save();
    }
}
