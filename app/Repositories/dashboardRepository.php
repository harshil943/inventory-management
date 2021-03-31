<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\EmployeeDetails;
use App\Models\InventoryDetails;
use App\Models\map_order_challan;
use App\Models\ProductDetails;
use App\Repositories\Interfaces\dashboardInterface;

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
    //     $total = DB::table('inventory_details')->select(DB::raw('sum(quantity*cost_per_product) as total'))->get();
    //     dd($total);
        return DB::table('inventory_details')->select(DB::raw('sum(quantity*cost_per_product) as total'))->get();
    }
}