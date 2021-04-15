<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Stripe;
use App\Repositories\Interfaces\OrderInterface;
class paymentController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function index($amount,$id)
    {
        // dd($amount);
        return view('payment.payment')->with('amount',$amount)->with('id',$id);
    }

    public function store(Request $request,$id)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->amount,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "Test payment"
        ]);

        // Session::flash('success', 'Payment successful!');

        // return back();

        $this->orderRepository->paymentComplete($id);
        session()->flash('success', 'Payment successfully');
        return redirect()->route('orders.index');
    }
}
