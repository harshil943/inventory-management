<?php

namespace App\Repositories;

use App\Models\quoteDetails;
use App\Repositories\Interfaces\quotationInterface;



class quotationRepository implements quotationInterface
{
    public function Create($request)
    {
        $quote = new quoteDetails;
        $quote->company_name = $request->company_name;
        $quote->email = $request->email;
        $quote->contact_number = $request->number;
        $quote->select_product_size = $request->size;
        $quote->quantity_needed = $request->quantity;
        $quote->product_id = $request->product_id;
        $quote->save();
    }

    public function allQuotation()
    {
        return quoteDetails::all();
    }

    public function deleteQuote($id)
    {
        quoteDetails::where('id',$id)->delete();
        return true;
    }
}