<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\productInterface;
class productDetailsController extends Controller
{
    private $productRepository;
    public function __construct(productInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function productDetails($id)
    {
        $data = $this->productRepository->productById($id);
        return view('productDetails.productDetails')->with('product',$data);
    }
}
