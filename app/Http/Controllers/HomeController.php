<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user() && (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin')))
        {
            return redirect('dashboard');
        }
        else
        {
            return view('home.home');
        }
    }
    public function aboutus()
    {
        if(Auth::user() && (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin')))
        {
            return redirect('home');
        }
        else
        {
            return view('home.aboutus');
        }
    }
    public function contactus()
    {
        if(Auth::user() && (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin')))
        {
            return redirect('home');
        }
        else
        {
            return view('home.contactus');
        }
    }
    public function quality()
    {
        if(Auth::user() && (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin')))
        {
            return redirect('home');
        }
        else
        {
            return view('home.quality');
        }
    }
}
