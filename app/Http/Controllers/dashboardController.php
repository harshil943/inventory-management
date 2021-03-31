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
        $pendingPayments = $this->dashboardRepository->pendngPayments();
        $canceledPayments = $this->dashboardRepository->canceledPayments();
        $noOfAdmins = $this->dashboardRepository->noOfAdmins();
        $employees = $this->dashboardRepository->employees();
        $totalSalary = $this->dashboardRepository->totalSalary();
        $totalProducts = $this->dashboardRepository->totalProducts();
        $inventoryQuantity = $this->dashboardRepository->inventoryQuantity();
        $inventoryCost = $this->dashboardRepository->inventoryCost();
        return view('dashboard.dashboard')->with('pedingOrders',$pendingOrders)
        ->with('completedOrders',$completedOrders)
        ->with('pendingPayments',$pendingPayments)
        ->with('canceledPayments',$canceledPayments)
        ->with('noOfAdmins',$noOfAdmins)
        ->with('employees',$employees)
        ->with('totalSalary', $totalSalary)
        ->with('totalProducts',$totalProducts)
        ->with('inventoryQuantity',$inventoryQuantity)
        ->with('inventoryCost',$inventoryCost);
    }
}
