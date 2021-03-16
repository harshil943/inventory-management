<?php

namespace Database\Seeders;

use App\Models\OrderDetails;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Order1
        $order1 = new OrderDetails();
        $order1->id = '1';
        $order1->e_way_bill_number = '601214991724';
        $order1->buyer_order_number = 'PO/JUL/10';
        $order1->product_id = '[1,2,3]';
        $order1->hsn_code = '[32233233,7664646,323243131]';
        $order1->quantity = '[1000,2500,3500]';
        $order1->unit = '["UNT","UNT","UNT"]';
        $order1->price_per_piece = '[12.40,20.2,32.4]';
        $order1->name_of_extra_cost = '["Delivery Cost","Man Cost"]';
        $order1->extra_hsn_code = '[9965,9966]';
        $order1->extra_cost_price = '[5000,2500]';
        $order1->igst_applicable = '0';
        $order1->gst_percentage = '18';
        $order1->payment_link = 'https://brightcontainers.com/product-description?product_id=16';

        //Order2
        $order2 = new OrderDetails();
        $order2->id = '2';
        $order2->e_way_bill_number = '601214991725';
        $order2->buyer_order_number = 'Verbal';
        $order2->product_id = '[1]';
        $order2->hsn_code = '[39566556]';
        $order2->quantity = '[1000]';
        $order2->unit = '["UNT"]';
        $order2->price_per_piece = '[12.40]';
        $order2->name_of_extra_cost = '["Delivery Cost"]';
        $order2->extra_hsn_code = '[9965]';
        $order2->extra_cost_price = '[5000]';
        $order2->igst_applicable = '1';
        $order2->gst_percentage = '18';
        $order2->payment_link = 'https://brightcontainers.com/product-description?product_id=16';

        //Order3
        $order3 = new OrderDetails();
        $order3->id = '3';
        $order3->e_way_bill_number = '601214991726';
        $order3->buyer_order_number = 'PO/JUL/11';
        $order3->product_id = '[1,2]';
        $order3->hsn_code = '[39985669,45544884]';
        $order3->quantity = '[1000,2500]';
        $order3->unit = '["UNT","UNT"]';
        $order3->price_per_piece = '[12.40,20.2]';
        $order3->name_of_extra_cost = NULL;
        $order3->extra_hsn_code = NULL;
        $order3->extra_cost_price = NULL;
        $order3->igst_applicable = '0';
        $order3->gst_percentage = '18';
        $order3->payment_link = 'https://brightcontainers.com/product-description?product_id=16';

        $order1->save();
        $order2->save();
        $order3->save();
    }
}
