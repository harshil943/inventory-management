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
        $designation = $this->designationRepository->all();
        return view('admin.empForm')->with('designation',$designation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = $this->employeeRepository->all();
        $admins = $this->employeeRepository->findAdmins();
        return view('admin.empDetails')->with('employees',$employees)->with('admins',$admins);
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

        return redirect()->route('employee.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeDetails  $employeeDetails
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDetails $employeeDetails)
    {

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
        return view('admin.empForm',compact(['employeeDetails','designation']));
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
        return redirect()->route('employee.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeDetails  $employeeDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeeRepository->delete($id);

        return back();
    }

    public function makeAdmin($id,Request $request)
    {
        
        $this->employeeRepository->makeAdmin($id,$request);
        return redirect()->route('employee.create');
    }

    public function removeAdmin($email)
    {
        $this->employeeRepository->removeAdmin($email);
        return redirect()->route('employee.create');
    }
}
