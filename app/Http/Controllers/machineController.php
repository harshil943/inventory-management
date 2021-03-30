<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\assetInterface;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\machineInterface;

class machineController extends Controller
{
    protected $machineRepository;
    protected $assetRepository;

    public function __construct(machineInterface $machineRepository,assetInterface $assetRepository)
    {
        $this->machineRepository = $machineRepository;
        $this->assetRepository = $assetRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machine = $this->machineRepository->allMachine();
        return view('machineError.manageMachine')->with('machine',$machine);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asset = $this->assetRepository->allAsset();
        return view('machineError.machineFrom')->with('asset',$asset);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->machineRepository->addMachine($request);
        return redirect()->route('machine.index');
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
        $machine = $this->machineRepository->machineById($id);
        $asset = $this->assetRepository->allAsset();
        return view('machineError.machineFrom')->with('machine',$machine)->with('asset',$asset);
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
        $this->machineRepository->updateMachine($request,$id);
        return redirect()->route('machine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->machineRepository->deleteMachine($id);
        return redirect()->route('machine.index');
    }
}
