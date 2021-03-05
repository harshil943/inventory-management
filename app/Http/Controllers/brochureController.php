<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $categoryBrochure = $this->productRepository->productCategoryAll();
        return view('client.brochure')->with('brochure',$categoryBrochure);
    }

    public function brochureDetails($id)
    {
        return view('client.brochureDetails')->with('id',$id);
    }
}
