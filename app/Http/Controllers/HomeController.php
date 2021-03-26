<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\productInterface;

class HomeController extends Controller
{
    protected $productRepository;

    public function __construct(productInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
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
            $products = $this->productRepository->allProducts();
            return view('home.home')->with('products',$products);
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
