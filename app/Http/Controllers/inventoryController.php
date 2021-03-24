<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\inventoryInterface;
use App\Repositories\Interfaces\productInterface;

class inventoryController extends Controller
{
    protected $inventoryrepository;
    protected $productRepository;

    public function __construct(inventoryInterface $inventoryrepository,productInterface $productRepository)
    {
        $this->inventoryrepository = $inventoryrepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = $this->inventoryrepository->inventoryDetails();
        return view('inventory.manageInventory')->with('inventory',$inventory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = $this->productRepository->allProducts();
        return view('inventory.inventoryForm')->with('product',$product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->inventoryrepository->addInventory($request);
        return redirect()->route('inventory.index');
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
        $product = $this->productRepository->allProducts();
        $inventory = $this->inventoryrepository->inventoryById($id);
        return view('inventory.inventoryForm')->with('inventory',$inventory)->with('product',$product);
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
        $this->inventoryrepository->updateInventory($request,$id);
        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->inventoryrepository->deleteInventory($id);
        return back();
    }
}
