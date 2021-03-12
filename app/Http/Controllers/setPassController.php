<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class setPassController extends Controller
{
    public function index()
    {
        return view('admin.setpassword');
    }

    public function changepass(Request $request)
    {
        dd($request);
    }
}
