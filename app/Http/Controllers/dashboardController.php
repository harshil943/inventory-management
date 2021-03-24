<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repositories\Interfaces\dashboardInterface;

class dashboardController extends Controller
{
    protected $dashboardRepository;

    public function __construct(dashboardInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }
    public function index(){

        $pendingOrders = $this->dashboardRepository->pendingOrders();
        $completedOrders = $this->dashboardRepository->completedOrders();
        return view('dashboard.dashboard')->with('pedingOrders',$pendingOrders)->with('completedOrders',$completedOrders);
    }
}
