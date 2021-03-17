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
        view()->share('orders', $data);
        $pdf = PDF::loadView('client.exportPdf', $data);
        return $pdf->download('invoice.pdf');
    }
}
