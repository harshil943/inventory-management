<?php

namespace Database\Seeders;

use App\Models\map_order_challan;
use Illuminate\Database\Seeder;

class MapOrderChallanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Map Order Details 1
        $map1 = new map_order_challan();
        $map1->id = '1';
        $map1->order_id = '1';
        $map1->challan_id = '1';
        $map1->buyer_id = '2';
        $map1->seller_id = '1';
        $map1->consignee_id = NULL;
        $map1->vehical_number = 'GJ 04 CP 1115';
        $map1->order_status = 'completed';
        $map1->payment_status = 'pending';
        $map1->shipping_date = '2021-03-01';
        $map1->dispatch_method = 'Vikas Transport Company';
        $map1->dispatch_document_number = NULL;
        $map1->lr_number = '1987 dt. 2-Sep-2020';
        $map1->order_date = '2021-03-14';
        $map1->due_date = '2021-03-14';

        //Map Order Details 1
        $map2 = new map_order_challan();
        $map2->id = '2';
        $map2->order_id = '2';
        $map2->challan_id = '2';
        $map2->buyer_id = '3';
        $map2->seller_id = '1';
        $map2->consignee_id = '1';
        $map2->vehical_number = 'MH 04 CP 1115';
        $map2->order_status = 'pending';
        $map2->payment_status = 'completed';
        $map2->shipping_date = '2021-03-01';
        $map2->dispatch_method = 'Transports';
        $map2->dispatch_document_number = 'Balaji Transport Company';
        $map2->lr_number = NULL;
        $map2->order_date = '2021-03-14';
        $map2->due_date = '2021-03-14';

        //Map Order Details 1
        $map3 = new map_order_challan();
        $map3->id = '3';
        $map3->order_id = '3';
        $map3->challan_id = NULL;
        $map3->buyer_id = '2';
        $map3->seller_id = '1';
        $map3->consignee_id = '2';
        $map3->vehical_number = 'HR 04 CP 1115';
        $map3->order_status = 'shipped';
        $map3->payment_status = 'canceled';
        $map3->shipping_date = '2021-03-01';
        $map3->dispatch_method = 'FedEx Transporter';
        $map3->dispatch_document_number = NULL;
        $map3->lr_number = NULL;
        $map3->order_date = '2021-03-14';
        $map3->due_date = '2021-03-14';

        $map1->save();
        $map2->save();
        $map3->save();
    }
}
