<?php

namespace App\Repositories\Interfaces;

interface expenseInterface
{
    public function addExpense($request);

    public function allExpense();

    public function expenseById($id);

    public function updateExpense($request,$id);

    public function deleteExpense($id);
}