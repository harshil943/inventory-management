<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class productDetailsController extends Controller
{
    public function productDetails($id)
    {

        $data = DB::table('product_details')->where('id',$id)->first();
        return view('client.productDetails')->with('product',$data);
    }
}
