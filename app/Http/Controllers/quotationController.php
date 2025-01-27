<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\quotationInterface;
use Illuminate\Support\Facades\Session;
use Pusher;
use UxWeb\SweetAlert\SweetAlert;

class quotationController extends Controller
{
    private $quotationRepository;

    public function __construct(quotationInterface $quotationRepository)
    {
        $this->quotationRepository = $quotationRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = $this->quotationRepository->allQuotation();
        return view('quotation.allQuotation')->with('quotes',$quotes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->quotationRepository->Create($request);
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $pusher->trigger('quote-request', 'App\\Events\\QuoteRequest',null);
        alert()->success('Done','Your Quotation Registered')->persistent('Close')->autoclose(3000);
        // session()->flash('success', 'Quotation added successfully');
        return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->quotationRepository->deleteQuote($id);
        session()->flash('warning', 'Quotation deleted successfully');
        return redirect()->route('quotation.index');
    }
}
