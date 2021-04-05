<?php

namespace App\Http\Controllers;

use App\Repositories\consigneeRepository;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\consigneeInterface;

class consigneeController extends Controller
{
    protected $consigneeRepository;

    public function __construct(consigneeInterface $consigneeRepository)
    {
        $this->consigneeRepository = $consigneeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consignees = $this->consigneeRepository->allConsignee();
        return view('consignee.consigneeDetails')->with('consignees',$consignees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consignee.consigneeForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->consigneeRepository->addConsignee($request);
        session()->flash('success', 'Consignee is added successfully');
        return redirect()->route('consignee.index');
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
        $consignee = $this->consigneeRepository->consigneeById($id);
        return view('consignee.consigneeForm')->with('consignee',$consignee);
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
        $this->consigneeRepository->updateConsignee($request,$id);
        session()->flash('info', 'Consignee is updated successfully');
        return redirect()->route('consignee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->consigneeRepository->deleteConsignee($id);
        session()->flash('warning', 'Consignee is deleted successfully');
        return redirect()->route('consignee.index');
    }
}
