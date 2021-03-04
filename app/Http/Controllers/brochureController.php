<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class brochureController extends Controller
{
    public function brochure()
    {
        return view('client.brochure');
    }

    public function brochureDetails($id)
    {
        return view('client.brochureDetails')->with('id',$id);
    }
}
