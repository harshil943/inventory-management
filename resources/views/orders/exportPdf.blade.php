<html>
    <head>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}


        {{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}
        {{-- <link href="/font-awesome/css/font-awesome.css" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        {{-- <link href="/css/animate.css" rel="stylesheet"> --}}
        {{-- <link href="/css/style.css" rel="stylesheet"> --}}
        {{-- <link href="/css/app.css" rel="stylesheet"> --}}

        {{-- Java Script Section --}}
        {{-- <script src="/js/jquery-3.1.1.min.js"></script> --}}
        {{-- <script src="/js/bootstrap.min.js"></script> --}}
        {{-- <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script> --}}
        {{-- <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> --}}

        <!-- Custom and plugin javascript -->
        {{-- <script src="/js/inspinia.js"></script> --}}
        {{-- <script src="/js/plugins/pace/pace.min.js"></script> --}}

        <style>
            * {
                box-sizing: border-box;
            }

            .col-6 {
                float: left;
                width: 50%;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;

            }

        </style>

    </head>

@php
    function getIndianCurrency(float $number)
    {
        $no = floor($number);
        $decimal = round($number - $no, 2) * 100;
        $decimal_part = $decimal;
        $hundred = null;
        $hundreds = null;
        $digits_length = strlen($no);
        $decimal_length = strlen($decimal);
        $i = 0;
        $str = array();
        $str2 = array();
        $words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');

        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? null : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $d = 0;
        while( $d < $decimal_length ) {
            $divider = ($d == 2) ? 10 : 100;
            $decimal_number = floor($decimal % $divider);
            $decimal = floor($decimal / $divider);
            $d += $divider == 10 ? 1 : 2;
            if ($decimal_number) {
                $plurals = (($counter = count($str2)) && $decimal_number > 9) ? 's' : null;
                $hundreds = ($counter == 1 && $str2[0]) ? ' and ' : null;
                @$str2 [] = ($decimal_number < 21) ? $words[$decimal_number].' '. $digits[$decimal_number]. $plural.' '.$hundred:$words[floor($decimal_number / 10) * 10].' '.$words[$decimal_number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str2[] = null;
        }

        $Rupees = implode('', array_reverse($str));
        $paise = implode('', array_reverse($str2));
        $paise = ($decimal_part > 0) ? ' And ' . $paise . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Indian Rupees ' : '') . $paise;
    }
@endphp
<body style="border:1px solid #b5babd;padding:10px;">
    <div class="row">
        <div class="col-6" style="border-right:1px solid #b5babd;">
            <h6>Seller: </h6>
            <strong style="font-size:24px;">{{$orders->seller->name}}</strong>
            <br>
            <strong>{{$orders->seller->head_office_address}}</strong>
            <table>
                <tr>
                    <td style="width:50%;">
                        State Code
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$orders->seller->state_code}}</strong>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">
                        GST Number
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$orders->seller->gst_number}}</strong>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">
                        PAN Number
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$orders->seller->pan_number}}</strong>
                    </td>
                </tr>
            </table>
            <hr style="color:#b5babd;">
            <h6>Buyer: </h6>
            <strong style="font-size: 24px;">{{$orders->buyer->name}}</strong>
            <br>
            <strong>{{$orders->buyer->address}}</strong>
            <table>
                <tr>
                    <td style="width:50%;">
                        State Code
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$orders->buyer->state_code}}</strong>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">
                        GST Number
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$orders->buyer->gst_number}}</strong>
                    </td>
                </tr>
            </table>
            <hr style="color:#b5babd;">
            <h6>Consignee: </h6>
            @if ($orders->consignee)
                <strong style="font-size: 24px;">{{$orders->consignee->name}}</strong>
                <br>
                <strong>{{$orders->consignee->address}}</strong>
                <table>
                    <tr>
                        <td style="width:50%;">
                            State Code
                        </td>
                        <td style="width:50%;">
                            : <strong>{{$orders->consignee->state_code}}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;">
                            GST Number
                        </td>
                        <td style="width:50%;">
                            : <strong>{{$orders->consignee->gst_number}}</strong>
                        </td>
                    </tr>
                </table>
            @else
                <strong>There Are No Consignee In This Order.</strong>
            @endif
        </div>
        <div class="col-6">
            <h4 style="text-align:right">Invoice No. - {{$orders->id}}</h4>
            <table>
                <tr>
                    <td style="width:50%;border-right:1px solid #b5babd;">
                        e-Way Bill No.
                        <br>
                        @if ($orders->order->e_way_bill_number)
                            <strong>{{$orders->order->e_way_bill_number}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Order Date
                        <br>
                            <strong>{{$orders->order_date}}</strong>
                        <br><br>
                        Shipping Date
                        <br>
                        @if ($orders->shipping_date)
                            <strong>{{$orders->shipping_date}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Buyer`s Order No.
                        <br>
                        <strong>{{$orders->order->buyer_order_number}}</strong>
                        <br><br>
                        Despatch Through
                        <br>
                        @if ($orders->dispatch_method)
                            <strong>{{$orders->dispatch_method}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Order Status
                        <br>
                        <strong>{{$orders->order_status}}</strong>
                    </td>
                    <td style="width:50%;">
                        Package Slip No.
                        <br>
                        @if ($orders->challan)
                            <strong>{{$orders->challan->id}}</strong>
                        @else
                            <strong>Not Generated Yet</strong>
                        @endif
                        <br><br>
                        Due Date
                        <br>
                        @if ($orders->due_daye)
                            <strong>{{$orders->due_date}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Despatch Document No.
                        <br>
                        @if ($orders->dispatch_document_number)
                            <strong>{{$orders->dispatch_document_number}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Landing/LR-RR No.
                        <br>
                        @if ($orders->lr_number)
                            <strong>{{$orders->lr_number}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Motor Vehicle No
                        <br>
                        @if ($orders->vehical_number)
                            <strong>{{$orders->vehical_number}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Payment Status
                        <br>
                        <strong>{{$orders->payment_status}}</strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @php
        $subtotal = 0;
        $taxtotal = 0;
    @endphp
    <br>
    <table>
        <thead style="text-align:center;">
            <tr>
                <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;"  rowspan="2">
                    Item List
                </th>
                <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;" rowspan="2">
                    HSN/SAC
                </th>
                <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;" rowspan="2" >
                    Quantity
                </th>
                <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;" rowspan="2">
                    Unit Price
                </th>
                @if (!$orders->order->igst_applicable)
                    <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;" colspan="2">
                        Integrated Tax (IGST)
                    </th>
                @else
                    <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;" colspan="2">
                        Central Tax (CGST)
                    </th>
                    <th style="border-top:1px solid #b5babd;border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;" colspan="2">
                        State Tax (SGST)
                    </th>
                @endif
                <th style="border-top:1px solid #b5babd;border-bottom:1px solid #b5babd;" rowspan="2">
                    Total Price
                </th>
            </tr>
            <tr>
                @if (!$orders->order->igst_applicable)
                    <th style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                        Tax Rate
                    </th>
                    <th style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                        Tax Amount
                    </th>
                @else
                    <th style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                        Tax Rate
                    </th>
                    <th style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                        Tax Amount
                    </th>
                    <th style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                        Tax Rate
                    </th>
                    <th style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                        Tax Amount
                    </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < sizeof($orders->order->product_id); $i++)
                <tr style="text-align:right;">
                    <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;text-align:left;">
                        <strong>{{$orders->order->product_id[$i]}}</strong>
                    </td>
                    <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                        {{$orders->order->hsn_code[$i]}}&nbsp;
                    </td>
                    <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                        <strong>
                            {{$orders->order->quantity[$i]}} {{$orders->order->unit[$i]}}&nbsp;
                        </strong>
                    </td>
                    <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                        {{$orders->order->price_per_piece[$i]}}&nbsp;
                    </td>
                    @if (!$orders->order->igst_applicable)
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                            {{$orders->order->gst_percentage}}%&nbsp;
                        </td>
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                            {{($orders->order->price_per_piece[$i] * $orders->order->gst_percentage)/100}}&nbsp;
                        </td>
                    @else
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                            {{$orders->order->gst_percentage/2}}%&nbsp;
                        </td>
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                            {{($orders->order->price_per_piece[$i] * ($orders->order->gst_percentage/2))/100}}&nbsp;
                        </td>
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                            {{$orders->order->gst_percentage/2}}%&nbsp;
                        </td>
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                            {{($orders->order->price_per_piece[$i] * ($orders->order->gst_percentage/2))/100}}&nbsp;
                        </td>
                    @endif
                    <td style="border-bottom:1px solid #b5babd;">
                        {{($orders->order->price_per_piece[$i] + ($orders->order->price_per_piece[$i] * $orders->order->gst_percentage)/100) * $orders->order->quantity[$i]}}&nbsp;
                    </td>
                    @php
                        $subtotal += $orders->order->price_per_piece[$i] * $orders->order->quantity[$i];
                        $taxtotal += (($orders->order->price_per_piece[$i] * $orders->order->gst_percentage)/100) * $orders->order->quantity[$i];
                    @endphp
                </tr>
            @endfor
            @if($orders->order->name_of_extra_cost)
                @for($i = 0; $i < sizeof($orders->order->name_of_extra_cost); $i++)
                    <tr style="text-align:right;">
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                            <i>{{$orders->order->name_of_extra_cost[$i]}}&nbsp;</i>
                        </td>
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                            {{$orders->order->extra_hsn_code[$i]}}&nbsp;
                        </td>
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">

                        </td>
                        <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                            {{$orders->order->extra_cost_price[$i]}}&nbsp;
                        </td>
                        @if (!$orders->order->igst_applicable)
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                {{$orders->order->gst_percentage}}%&nbsp;
                            </td>
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                {{($orders->order->extra_cost_price[$i] * $orders->order->gst_percentage)/100}}&nbsp;
                            </td>
                        @else
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                {{$orders->order->gst_percentage/2}}%&nbsp;
                            </td>
                            <td style="border-right:1px solid #b5babd;border-bottom:1px solid #b5babd;">
                                {{($orders->order->extra_cost_price[$i] * ($orders->order->gst_percentage/2))/100}}&nbsp;
                            </td>
                            <td>
                                {{$orders->order->gst_percentage/2}}%&nbsp;
                            </td>
                            <td>
                                {{($orders->order->extra_cost_price[$i] * ($orders->order->gst_percentage/2))/100}}&nbsp;
                            </td>
                        @endif
                        <td style="border-bottom:1px solid #b5babd;">
                            {{$orders->order->extra_cost_price[$i] + ($orders->order->extra_cost_price[$i] * $orders->order->gst_percentage)/100}}&nbsp;
                        </td>
                    </tr>
                    @php
                        $subtotal += $orders->order->extra_cost_price[$i];
                        $taxtotal += ($orders->order->extra_cost_price[$i] * $orders->order->gst_percentage)/100;
                    @endphp
                @endfor
            @endif
        </tbody>
    </table>
    @php
        $subtotal = round($subtotal,2);
        $taxtotal = round($taxtotal,2);
    @endphp
    <table style="text-align: right;">
        <tr>
            <td style="width:25%;">
                <strong>Sub Total :</strong>
            </td>
            <td>
                {{$subtotal}}&nbsp;<br>
                <strong>{{getIndianCurrency($subtotal)}}</strong>
                <hr style="color:#b5babd;">
            </td>
        </tr>
        @if (!$orders->order->igst_applicable)
            <tr>
                <td>
                    <strong>IGST Tax :</strong>
                </td>
                <td>
                    <i class="fa fa-inr">&nbsp;{{$taxtotal}}</i><br>
                    <strong>{{getIndianCurrency($taxtotal)}}</strong>
                    <hr style="color:#b5babd;">
                </td>
            </tr>
        @else
            <tr>
                <td>
                    <strong>CGST Tax :</strong>
                </td>
                <td>
                    {{round($taxtotal/2,2)}}&nbsp;<br>
                    <strong>{{getIndianCurrency(round($taxtotal/2,2))}}</strong>
                    <hr style="color:#b5babd;">
                </td>
            </tr>
            <tr>
                <td>
                    <strong>SGST Tax :</strong>
                </td>
                <td>
                    {{round($taxtotal/2,2)}}&nbsp;<br>
                    <strong>{{getIndianCurrency(round($taxtotal/2,2))}}</strong>
                    <hr style="color:#b5babd;">
                </td>
            </tr>
        @endif
        <tr>
            <td>
                <strong>Sales Round Off :</strong>
            </td>
            <td>
                {{round(round($subtotal + $taxtotal) - ($subtotal + $taxtotal),2)}}&nbsp;<br>
                <strong>Zero Indian Rupees {{getIndianCurrency(abs(round(round($subtotal + $taxtotal) - ($subtotal + $taxtotal),2)))}}</strong>
                <hr style="color:#b5babd;">
            </td>
        </tr>
        <tr>
            <td>
                <strong>Grand Total :</strong>
            </td>
            <td>
                {{round($subtotal + $taxtotal)}}&nbsp;<br>
                <strong>{{getIndianCurrency(round($subtotal + $taxtotal))}}</strong>
                <hr style="color:#b5babd;">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>E. & O.E&nbsp;</strong>
            </td>
        </tr>
    </table>

    <div class="row">
        <div class="col-6" style="border-right:1px solid #b5babd;padding-right:10px;">
            <strong>Declaration</strong>
            <br><br>
            1. We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.
            <br>
            2. Interest @ 24% levied if this invoice payment not paid as per terms of payment.
        </div>
        <div class="col-6" style="padding-left:20px;">
            <strong>Company's Bank Details</strong>
            <br><br>
            <table>
                <tr>
                    <td style="width:50%;">
                        Bank Name :
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$orders->seller->bank_name}}</strong>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">
                        Branch Name:
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$orders->buyer->gst_number}}</strong>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">
                        A/c No.:
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$orders->seller->acc_no}}</strong>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">
                        IFSC Code:
                    </td>
                    <td style="width:50%;">
                        : <strong>{{$orders->seller->IFSC_code}}</strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <hr style="color:#b5babd;">

    <div class="row">
        <div class="col-sm-6 border-right">
            <br><br><br><br>
            <strong>
                Stamp & Signature <br>
                To {{$orders->buyer->name}},
            </strong>
        </div>
        <div class="col-sm-6 text-right">
            <br><br><br><br>
            <strong>
                Stamp & Signature <br>
                From {{$orders->seller->name}},
            </strong>
        </div>
    </div>
</body>
</html>
