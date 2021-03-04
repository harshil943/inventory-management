<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productCategoryController extends Controller
{
    public function productCategory($category)
    {
        return view('client.productCategory')->with('data',$category);
    }
}
