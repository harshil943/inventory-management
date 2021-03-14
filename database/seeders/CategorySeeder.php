<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Product Category Seeder
        $category = new ProductCategory();
        $category->id = '1';
        $category->category_name = 'Pesticide Bottles';
        $category->category_image_name = 'pesticide_bottles.jpg';
        $category->category_brochure_file_name = 'pesticide_bottle.pdf';

        $category->save();
    }
}
