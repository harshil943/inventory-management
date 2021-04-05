<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\assetInterface;

class assetController extends Controller
{
    protected $assetRepositoy;

    public function __construct(assetInterface $assetRepositoy)
    {
        $this->assetRepositoy = $assetRepositoy;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset = $this->assetRepositoy->allAsset();
        return view('asset.manageAsset')->with('asset',$asset);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.assetForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->assetRepositoy->addAsset($request);
        session()->flash('success', 'Asset is added successfully');
        return redirect()->route('asset.index');
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
        $asset = $this->assetRepositoy->assetById($id);
        return view('asset.assetForm')->with('asset',$asset);
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
        $this->assetRepositoy->updateAsset($request,$id);
        session()->flash('info', 'Asset is updated');
        return redirect()->route('asset.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->assetRepositoy->deleteAsset($id);
        session()->flash('warning', 'Asset is deleted');
        return back();
    }
}
