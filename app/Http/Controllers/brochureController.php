<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

use App\Repositories\Interfaces\productInterface;


class brochureController extends Controller
{
    private $productRepository;

    public function __construct(productInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function brochure()
    {
        if(Auth::user() && (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin')))
        {
            return redirect('home');
        }
        else
        {
            $categoryBrochure = $this->productRepository->productsCategoryAll();
            return view('brochure.brochure')->with('brochure',$categoryBrochure);
        }
    }
    public function brochureDetails($id)
    {
        return view('brochure.brochureDetails')->with('id',$id);
    }
}
