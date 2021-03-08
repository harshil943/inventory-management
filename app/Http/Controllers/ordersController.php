<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\OrderInterface;
use PDF;

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

    public function details($data){
        return view('client.orderDetails')->with('order',$data);
    }

    public function exportPDF() {        
        $data = $this->orderRepository->all();
        // return view('client.exportPdf')->with('order',$data);
        view()->share('order', $data);
        // $pdf_doc = PDF::loadView('client.exportPdf',$data);
        // $data = [

        //     'title' => 'Welcome to HDTuto.com',

        //     'date' => date('m/d/Y')

        // ];

          
        
        $pdf = PDF::loadView('client.exportPdf', $data);

    

        return $pdf->download('itsolutionstuff.pdf');
        // return $pdf_doc->download('invoice.pdf');
    }    
}