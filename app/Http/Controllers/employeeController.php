<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDetails;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\designationInterface;
use App\Repositories\Interfaces\employeeInterface;

class employeeController extends Controller
{
    private $designationRepository;
    private $employeeRepository;

    public function __construct(designationInterface $designationRepository,employeeInterface $employeeRepository)
    {
        $this->designationRepository = $designationRepository;
        $this->employeeRepository = $employeeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employeeRepository->all();
        $admins = $this->employeeRepository->findAdmins();
        return view('employee.empDetails')->with('employees',$employees)->with('admins',$admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designation = $this->designationRepository->all();
        return view('employee.empForm')->with('designation',$designation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->employeeRepository->storeEmp($request);
        session()->flash('success', 'Employee added successfully');
        return redirect()->route('employee.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeDetails  $employeeDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = $this->designationRepository->all();
        $employeeDetails = $this->employeeRepository->empById($id);
        return view('employee.empForm',compact(['employeeDetails','designation']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeDetails  $employeeDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->employeeRepository->updateEmp($id,$request);
        session()->flash('info', 'Employee updated successfully');
        return redirect()->route('employee.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeDetails  $employeeDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($email_id)
    {
        $this->employeeRepository->delete($email_id);
        session()->flash('warning', 'Employee deleted successfully');
        return back();
    }

    public function makeAdmin($id,Request $request)
    {
        $this->employeeRepository->makeAdmin($id,$request);
        session()->flash('success', 'Selected employee is now admin');
        return redirect()->route('employee.index');
    }

    public function removeAdmin($email)
    {
        $this->employeeRepository->removeAdmin($email);
        session()->flash('warning', 'Selected admin is now employee only');
        return redirect()->route('employee.index');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\EmployeeDetails  $employeeDetails
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(EmployeeDetails $employeeDetails)
    // {

    // }
}
