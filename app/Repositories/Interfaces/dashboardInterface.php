<?php

namespace App\Repositories\Interfaces;


interface dashboardInterface
{
    public function pendingOrders();

    public function completedOrders();

    public function pendngPayments();

    public function canceledPayments();

    public function noOfAdmins();

    public function employees();

    public function totalSalary();

    public function totalProducts();

    public function inventoryQuantity();

    public function inventoryCost();

    public function expenseMonth();

    public function getExpense();

    public function totalSell();

    public function ordersMonth();

    public function orders();
}
