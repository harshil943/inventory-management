<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repositories\Interfaces\dashboardInterface;
use App\Models\ExpenseDetails;
use App\Repositories\dashboardRepository;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    protected $dashboardRepository;

    public function __construct(dashboardInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }
    public function index()
    {

        // $expenses = ExpenseDetails::select(DB::raw("sum(quantity*cost_per_quantity) as sum"))->groupBy(DB::raw('MONTH(created_at)'))->get()->toArray();
        // $months = ExpenseDetails::select(DB::raw("MONTH(created_at) as month"))->distinct()->get()->toArray();
        // $month = array();
        // $expense = array();
        // foreach ($months as $item) {
        //     array_push($month,$item['month']);

        // }foreach ($expenses as $item) {
        //     array_push($expense,$item['sum']);
        // }

        $month = $this->dashboardRepository->getMonth();
        $expense = $this->dashboardRepository->getExpense();
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
        ->with('inventoryCost',$inventoryCost)
        ->with('expense',$expense)
        ->with('month',$month);
    }
}
