<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\productInterface;
use App\Events\querymail;
use App\Notifications\queryNotification;
use Illuminate\Support\Facades\Notification;

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
            $products = $this->productRepository->allVisibleProducts();
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
            $products = $this->productRepository->allProducts();
            $category = $this->productRepository->productsCategoryAll();
            return view('home.contactus')->with('products',$products)->with('category',$category);
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

    public function contact(Request $request)
    {
        // if (auth()->user() != null) {
        //     auth()->user()->notify(new queryNotification());
        // }
        try {
            auth()->user()->find('1')->notify(new queryNotification($request));
        } finally {
            event(new querymail($request));
            alert()->success('Done','Your Query Registered')->persistent('Close')->autoclose(3000);
        }

        return back();
    }
}
