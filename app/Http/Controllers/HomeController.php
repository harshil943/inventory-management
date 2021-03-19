<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->password_change == '1')
        {   
            return redirect()->route('setpassword');
        }
        else
        {
            if(Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
            {
                return view('dashboard.dashboard');
            }
            else
            {
                return view('home');
            }
        }
    }
}
