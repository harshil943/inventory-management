<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productCategory;


class brochureController extends Controller
{
    public function brochure()
    {
        $categoryBrochure = productCategory::all();
        return view('client.brochure')->with('brochure',$categoryBrochure);
    }

    public function brochureDetails($id)
    {
        return view('client.brochureDetails')->with('id',$id);
    }
}
