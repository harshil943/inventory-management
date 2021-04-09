<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\EmployeeDetails;
use App\Models\InventoryDetails;
use App\Models\map_order_challan;
use App\Models\ProductDetails;
use App\Repositories\Interfaces\dashboardInterface;
use App\Models\ExpenseDetails;
use App\Models\OrderDetails;

class dashboardRepository implements dashboardInterface
{
    public function pendingOrders()
    {
        return map_order_challan::where('order_status','pending')->count();
    }

    public function completedOrders()
    {
        return map_order_challan::where('order_status','completed')->count();
    }

    public function pendngPayments()
    {
        return map_order_challan::where('payment_status','pending')->count();
    }

    public function canceledPayments()
    {
        return map_order_challan::where('payment_status','canceled')->count();
    }

    public function noOfAdmins()
    {
        return EmployeeDetails::where('admin','1')->count();
    }

    public function employees()
    {
        return EmployeeDetails::count();
    }

    public function totalSalary()
    {
        return EmployeeDetails::sum('salary');
    }

    public function totalProducts()
    {
        return ProductDetails::count();
    }

    public function inventoryQuantity()
    {
        return InventoryDetails::sum('quantity');
    }

    public function inventoryCost()
    {
        return DB::table('inventory_details')->select(DB::raw('sum(quantity*cost_per_product) as total'))->get();
    }

    public function expenseMonth()
    {
        $months = ExpenseDetails::select(DB::raw("DATE_FORMAT(created_at, '%m-%Y') as month"))->orderBy('created_at')->distinct()->get()->toArray();
        $month = array();
        foreach ($months as $item) {
            array_push($month,$item['month']);
        }
        // dd($month);
        return $month;
    }

    public function getExpense()
    {
        $expenses = ExpenseDetails::select(DB::raw("sum(quantity*cost_per_quantity) as sum"))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->get()->toArray();
        // dd($expenses);
        $expense = array();
        foreach ($expenses as $item) {
            array_push($expense,$item['sum']);
        }

        return $expense;
    }

    public function totalSell()
    {
        $total = OrderDetails::select()->sum('totalCost');
        return $total;
    }
    public function ordersMonth()
    {
        $ordersMonth = OrderDetails::select(DB::raw("DATE_FORMAT(created_at, '%m-%Y') as month"))
        ->orderBy('created_at')
        ->distinct()
        ->get()->toArray();

        $month = array();
        foreach ($ordersMonth as $item) {
            array_push($month,$item['month']);
        }
        // dd($month);
        return $month;
    }

    public function orders()
    {
        $order = OrderDetails::select(DB::raw('COUNT(*) as count'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->get()->toArray();

        $orders = array();
        foreach ($order as $item) {
            array_push($orders,$item['count']);
        }
        // dd($orders);
        return $orders;
    }

    public function quantityPerMonth()
    {

        $quantitys = OrderDetails::select(DB::raw("sum(totalQuantity) as sum"))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->get()->toArray();

        $quantity = array();
        foreach ($quantitys as $item) {
            array_push($quantity,$item['sum']);
        }

        return $quantity;
    }

    public function sellPerMonth()
    {
        $sells = OrderDetails::select(DB::raw('sum(totalCost) as sum'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->get()->toArray();

        $sell = array();
        foreach ($sells as $item) {
            array_push($sell,$item['sum']);
        }

        return $sell;
    }
}
