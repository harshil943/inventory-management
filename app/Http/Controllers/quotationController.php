<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repositories\Interfaces\quotationInterface;

class quotationController extends Controller
{
    private $quotationRepository;

    public function __construct(quotationInterface $quotationRepository)
    {
        $this->quotationRepository = $quotationRepository;
    }
    public function quotationCreate(Request $request)
    {
        $this->quotationRepository->Create($request);
        return back();
    }
}
