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

    public function challanDetails($id){
        $data = $this->orderRepository->challanDetails($id);
        return view('orders.challanDetails')->with('orders',$data);
    }

    public function printInvoice($id,$type) {
        $data = $this->orderRepository->orderDetails($id,$type);
        view()->share('orders', $data);
        return PDF::loadView('orders.printInvoice')->setWarnings(false)->stream('invoice - '. $data->id .'pdf');
    }

    public function printChallan($id) {
        $data = $this->orderRepository->challanDetails($id);
        view()->share('orders', $data);
        return PDF::loadView('orders.printChallan')->setWarnings(false)->stream('challan.pdf');
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
        return view('orders.orders')->with('order',$data);
    }

    public function challanForm($id)
    {
        $buyer = $this->orderRepository->buyerDetails();
        $consignee = $this->orderRepository->consigneeDetails();
        $product = $this->orderRepository->productDetails();
        return view('orders.challanForm')->with('buyer',$buyer)->with('consignee',$consignee)->with('product',$product)->with('map',$id);
    }

    public function challanCreate($id,Request $request)
    {
        $this->orderRepository->challanCreate($id,$request);
        return back();
    }

    public function orderDelete($id)
    {
        $this->orderRepository->orderDelete($id);
        return redirect()->route('orders.index');
    }

    public function challanDelete($id)
    {
        $this->orderRepository->challanDelete($id);
        return redirect()->route('orders.index');
    }
}
