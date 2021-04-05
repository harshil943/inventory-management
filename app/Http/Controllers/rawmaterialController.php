<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\rawmaterialInterface;

class rawmaterialController extends Controller
{
    protected $rawmaterialRepository;

    public function __construct(rawmaterialInterface $rawmaterialRepository)
    {
        $this->rawmaterialRepository = $rawmaterialRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw = $this->rawmaterialRepository->allRawmaterial();
        return view('rawmaterial.manageRawmaterial')->with('raw',$raw);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rawmaterial.rawmaterialForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->rawmaterialRepository->addMaterial($request);
        session()->flash('success', 'Raw material requested');
        return redirect()->route('rawmaterial.index');
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
        $raw = $this->rawmaterialRepository->materialById($id);
        return view('rawmaterial.rawmaterialForm')->with('raw',$raw);
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
        $this->rawmaterialRepository->updateMaterial($request,$id);
        session()->flash('info', 'Material request successfully');
        return redirect()->route('rawmaterial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rawmaterialRepository->deleteMaterial($id);
        session()->flash('warning', 'Material request deleted successfully');
        return back();
    }
}
