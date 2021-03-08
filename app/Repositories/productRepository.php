<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\User;
use App\Repositories\Interfaces\productInterface;

class productRepository implements productInterface
{
    public function productsByCategory($id)
    {
        return DB::table('product_details')->where('category_id',$id)->get();
    }

   public function productById($id)
   {
       return DB::table('product_details')->where('id',$id)->first();
   }
   
   public function productsCategoryAll()
   {
       return DB::table('product_category')->get();
   }
}