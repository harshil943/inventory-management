<?php

namespace App\Repositories;

use App\Models\ExpenseDetails;
use App\Repositories\Interfaces\expenseInterface;

class expenseRepository implements expenseInterface
{
    public function addExpense($request)
    {
       $raw = new ExpenseDetails;

       $raw->expense_details = $request->expense_details;
       $raw->quantity = $request->quantity;
       $raw->cost_per_quantity = $request->cost;
       $raw->save();

       return true;
    }

    public function allExpense()
    {
        return ExpenseDetails::all();
    }

    public function expenseById($id)
    {
        return ExpenseDetails::where('id',$id)->firstorfail();
    }

    public function updateExpense($request,$id)
    {
        ExpenseDetails::where('id',$id)->update(array(
            'expense_details'=>$request->expense_details,
            'quantity'=>$request->quantity,
            'cost_per_quantity'=>$request->cost
        ));

        return true;
    }

    public function deleteExpense($id)
    {
        ExpenseDetails::where('id',$id)->delete();
        return true;
    }
}
