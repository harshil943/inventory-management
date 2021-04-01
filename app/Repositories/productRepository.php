<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Repositories\Interfaces\productInterface;

class productRepository implements productInterface
{
    public function allProducts()
    {
        return ProductDetails::all();
    }
    public function allVisibleProducts()
    {
        return ProductDetails::where('product_visible','1')->get();
    }
    public function productsByCategory($id)
    {
        return DB::table('product_details')->where('category_id',$id)->where('product_visible','1')->get();
    }

   public function productById($id)
   {
       return DB::table('product_details')->where('id',$id)->first();
   }

   public function categoryById($id)
   {
       return ProductCategory::where('id',$id)->first();
   }

   public function productsCategoryAll()
   {
       return DB::table('product_category')->get();
   }

   public function deleteProduct($id)
   {
       ProductDetails::where('id',$id)->first()->forcedelete();
       return true;
   }

   public function storeProduct($request)
   {

       $product = new ProductDetails;

                $product_image_name = $request->product_name.'.'.$request->product_image->getClientOriginalExtension();
                $request->product_image->storeAs('public/product',$product_image_name);

                $product->category_id = $request->category;
                $product->product_name = $request->product_name;
                $product->product_visible = $request->visible;
                $product->product_info_1 = $request->product_info_1;
                $product->product_info_2 = $request->product_info_2;
                $product->extra_info_1 = $request->extra_info_1;
                $product->extra_info_2 = $request->extra_info_2;
                $product->extra_info_3 = $request->extra_info_3;
                $product->extra_info_4 = $request->extra_info_4;
                $product->available_sizes = $request->available_sizes;
                $product->available_color_bottle = $request->available_color_bottle;
                $product->available_color_cap = $request->available_color_cap;

                $product->table_header = json_encode($request->table_header);
                $product->brimful_capacity = json_encode($request->brimful_capacity);
                $product->height = json_encode($request->height);
                $product->length = json_encode($request->length);
                $product->thickness = json_encode($request->thickness);
                $product->label_height = json_encode($request->label_height);
                $product->neck_id = json_encode($request->neck_id);
                $product->standard_weight = json_encode($request->standard_weight);
                $product->MOQ = json_encode($request->MOQ);
                $product->cap_name = json_encode($request->cap_name);

                $product->product_image_name = $product_image_name;

            $product->save();
   }

   public function updateProduct($request,$id)
   {
        $product_image_name = $request->product_name.'.'.$request->product_image->getClientOriginalExtension();
        $request->product_image->storeAs('public/product',$product_image_name);

        ProductDetails::where('id',$id)->update(array(
            'category_id'=> $request->category,
            'product_name'=> $request->product_name,
            'product_visible'=> $request->visible,
            'product_info_1'=> $request->product_info_1,
            'product_info_2'=> $request->product_info_2,
            'extra_info_1'=> $request->extra_info_1,
            'extra_info_2'=> $request->extra_info_2,
            'extra_info_3'=> $request->extra_info_3,
            'extra_info_4'=> $request->extra_info_4,
            'available_sizes'=> $request->available_sizes,
            'available_color_bottle'=> $request->available_color_bottle,
            'available_color_cap'=> $request->available_color_cap,
            'table_header' => json_encode($request->table_header),
            'brimful_capacity' => json_encode($request->brimful_capacity),
            'height' => json_encode($request->height),
            'length' => json_encode($request->length),
            'thickness' => json_encode($request->thickness),
            'label_height' => json_encode($request->label_height),
            'neck_id' => json_encode($request->neck_id),
            'standard_weight' => json_encode($request->standard_weight),
            'MOQ' => json_encode($request->MOQ),
            'cap_name' => json_encode($request->cap_name),
            'product_image_name'=> $product_image_name,
        ));
        return true;
   }

   public function storeCategory($request)
   {
       $category = new ProductCategory;

       $category_image_name = $request->category_name.'.'.$request->category_image->getClientOriginalExtension();
       $request->category_image->storeAs('public/brochure',$category_image_name);

       $brochure_file_name = $request->category_name.'.'.$request->category_image->getClientOriginalExtension();
       $request->brochure_file->storeAs('public/brochure',$brochure_file_name);

       $category->category_name = $request->category_name;
       $category->category_image_name = $category_image_name;
       $category->category_brochure_file_name = $brochure_file_name;

       $category->save();
       return true;
   }

   public function updateCategory($request,$id)
   {
        $category_image_name = $request->category_name.'.'.$request->category_image->getClientOriginalExtension();
        $request->category_image->storeAs('public/brochure',$category_image_name);

        $brochure_file_name = $request->category_name.'.'.$request->category_image->getClientOriginalExtension();
        $request->brochure_file->storeAs('public/brochure',$brochure_file_name);

       ProductCategory::where('id',$id)->update(array(
           'category_name'=>$request->category_name,
           'category_image_name'=>$category_image_name,
           'category_brochure_file_name'=>$brochure_file_name

       ));
       return true;
   }

   public function deleteCategory($id)
   {
       ProductCategory::where('id',$id)->forcedelete();
       return true;
   }

}
