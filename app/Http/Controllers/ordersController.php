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
        return view('client.orders')->with('order',$data);
    }

    public function orderDetails($id){
        $data = $this->orderRepository->orderDetails($id);
        return view('client.orderDetails')->with('orders',$data);
    }

    public function exportPDF($id) {
        $data = $this->orderRepository->orderDetails($id);
        return view('client.exportPdf')->with('orders', $data);
        
        // view()->share('orders', $data);
        // return PDF::loadView('client.exportPdf')->setWarnings(false)->stream('invoice.pdf');
        
        // $new = view('client.exportPdf')->with('orders', $data);
        // return PDF::loadHTML($new)->setWarnings(false)->stream('invoice.pdf');

        // $view = view('client.exportPdf')->with('orders', $data);
        // $contents = $view->render();
        // return PDF::loadHTML($contents)->setWarnings(false)->stream('invoice.pdf');
    }

    public function orderForm()
    {
        $data = $this->orderRepository->orderFormDetails();
        return view('admin.orderForm');
    }

    public function orderCreate(Request $request)
    {
        dd($request);
    }
}
