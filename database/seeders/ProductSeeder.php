<?php

namespace Database\Seeders;

use App\Models\ProductDetails;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Product Details 1
        $detail1 = new ProductDetails();
        $detail1->id = '1';
        $detail1->category_id = '1';
        $detail1->product_name = 'Bio pesticide Bottle';
        $detail1->product_image_name = 'pesticide_bottle.png';
        $detail1->product_filter_type = '1';
        $detail1->product_info_1 = 'We are engaging in Blow molding manufacturing since 2005. We have the latest machinery & well-trained staff which gives excellent quality bottles to pack your precious product.';
        $detail1->product_info_2 = 'We introduce a new range of HDPE bottles that are useful to pack Liquid Humic & Liquid PGR.';
        $detail1->available_sizes = '25ml, 50ml, 100ml, 250ml, 500ml, & 1Ltr';
        $detail1->available_color_bottle = 'White & Silver as per shape';
        $detail1->available_color_cap = 'White, Red & Silver';
        $detail1->table_header = '["Mahavir Shape","Pesticide Shape","Lube Shape"]';
        $detail1->brimful_capacity = '[5600,5600,5850]';
        $detail1->height = '[300,295,310]';
        $detail1->length = '[180,190,230]';
        $detail1->thickness = '[135,135,110]';
        $detail1->label_height = '[175,160,0]';
        $detail1->neck_id = '[30,35,26]';
        $detail1->standard_weight = '[250,300,245]';
        $detail1->MOQ = '[1000,1000,1000]';
        $detail1->cap_name = '["Lock Cap","Imida,big","Lock Cap"]';

        //Product Details 2
        $detail2 = new ProductDetails();
        $detail2->id = '2';
        $detail2->category_id = '1';
        $detail2->product_name = 'Imida Bottles';
        $detail2->product_image_name = 'imida_bottle.png';
        $detail2->product_filter_type = '1';
        $detail2->product_info_1 = 'We are engaging in Blow molding manufacturing since 2005. We have the latest machinery & well-trained staff which gives excellent quality bottles to pack your precious product.';
        $detail2->product_info_2 = 'We introduce a new range of HDPE bottles that are useful to pack Liquid Humic & Liquid PGR.';
        $detail2->available_sizes = '25ml, 50ml, 100ml, 250ml, 500ml, & 1Ltr';
        $detail2->available_color_bottle = 'White & Silver as per shape';
        $detail2->available_color_cap = 'White, Red & Silver';
        $detail2->table_header = '["Mahavir Shape","Pesticide Shape","Lube Shape"]';
        $detail2->brimful_capacity = '[5600,5600,5850]';
        $detail2->height = '[300,295,310]';
        $detail2->length = '[180,190,230]';
        $detail2->thickness = '[135,135,110]';
        $detail2->label_height = '[175,160,0]';
        $detail2->neck_id = '[30,35,26]';
        $detail2->standard_weight = '[250,300,245]';
        $detail2->MOQ = '[1000,1000,1000]';
        $detail2->cap_name = '["Lock Cap","Imida,big","Lock Cap"]';

        //Product Details 3
        $detail3 = new ProductDetails();
        $detail3->id = '3';
        $detail3->category_id = '1';
        $detail3->product_name = '3 Strip Bottle';
        $detail3->product_image_name = '3_strip_bottle.png';
        $detail3->product_filter_type = '1';
        $detail3->product_info_1 = 'We are engaging in Blow molding manufacturing since 2005. We have the latest machinery & well-trained staff which gives excellent quality bottles to pack your precious product.';
        $detail3->product_info_2 = 'We introduce a new range of HDPE bottles that are useful to pack Liquid Humic & Liquid PGR.';
        $detail3->available_sizes = '25ml, 50ml, 100ml, 250ml, 500ml, & 1Ltr';
        $detail3->available_color_bottle = 'White & Silver as per shape';
        $detail3->available_color_cap = 'White, Red & Silver';
        $detail3->table_header = '["Mahavir Shape","Pesticide Shape","Lube Shape"]';
        $detail3->brimful_capacity = '[5600,5600,5850]';
        $detail3->height = '[300,295,310]';
        $detail3->length = '[180,190,230]';
        $detail3->thickness = '[135,135,110]';
        $detail3->label_height = '[175,160,0]';
        $detail3->neck_id = '[30,35,26]';
        $detail3->standard_weight = '[250,300,245]';
        $detail3->MOQ = '[1000,1000,1000]';
        $detail3->cap_name = '["Lock Cap","Imida,big","Lock Cap"]';


        $detail1->save();
        $detail2->save();
        $detail3->save();
    }
}
