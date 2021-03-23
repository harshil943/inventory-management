<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\OrderInterface;

use PDF;
use DataTables;

class ordersController extends Controller
{
    private $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(){
        $data = $this->orderRepository->all();
        return view('orders.orders')->with('order',$data);
    }

    public function orderDetails($id){
        $data = $this->orderRepository->orderDetails($id,null);
        return view('orders.orderDetails')->with('orders',$data);
    }

    public function exportPDF($id,$type) {
        $data = $this->orderRepository->orderDetails($id,$type);
        // return view('orders.exportPdf')->with('orders', $data);
        view()->share('orders', $data);
        return PDF::loadView('orders.exportPdf')->setWarnings(false)->stream('invoice.pdf');
    }

    public function orderForm()
    {
        $buyer = $this->orderRepository->buyerDetails();
        $consignee = $this->orderRepository->consigneeDetails();
        $product = $this->orderRepository->productDetails();
        return view('orders.orderForm')->with('buyer',$buyer)->with('consignee',$consignee)->with('product',$product);
    }

    public function orderCreate(Request $request)
    {
        $this->orderRepository->orderCreate($request);
        return back();
    }
}
