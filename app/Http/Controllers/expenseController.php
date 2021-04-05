<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\expenseInterface;

class expenseController extends Controller
{
    protected $expenseRepository;

    public function __construct(expenseInterface $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = $this->expenseRepository->allExpense();
        return view('expense.manageExpense')->with('expense',$expense);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.expenseForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->expenseRepository->addExpense($request);
        session()->flash('success', 'Expense added successfully');
        return redirect()->route('expense.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = $this->expenseRepository->expenseById($id);
        return view('expense.expenseForm')->with('expense',$expense);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->expenseRepository->updateExpense($request,$id);
        session()->flash('info', 'Expense updated successfully');
        return redirect()->route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->expenseRepository->deleteExpense($id);
        session()->flash('warning', 'Expense deleted successfully');
        return back();
    }
}
