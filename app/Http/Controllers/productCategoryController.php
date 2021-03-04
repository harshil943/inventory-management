<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productCategoryController extends Controller
{
    public function productCategory($categoryId)
    {
        $categoryData = DB::table('product_details')->where('category_id',$categoryId)->get();
        return view('client.productCategory')->with('data',$categoryData);
    }
}
