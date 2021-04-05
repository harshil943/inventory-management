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
    public function brochure($id)
    {
        return view('brochure.brochure')->with('id',$id);
    }
}
