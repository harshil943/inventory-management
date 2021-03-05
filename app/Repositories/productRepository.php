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

   
   
}