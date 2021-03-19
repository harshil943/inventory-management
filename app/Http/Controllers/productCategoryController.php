<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\productInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productCategoryController extends Controller
{
    private $productRepository;

    public function __construct(productInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function productCategory($categoryId)
    {
        $categoryData = $this->productRepository->productsByCategory($categoryId);
        return view('productCategory.productCategory')->with('data',$categoryData);
    }
}
