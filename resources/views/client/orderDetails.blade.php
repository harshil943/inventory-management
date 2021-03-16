@extends('layouts.app')

@section('title')
    Invoice Info | Bright Containers
@endsection

@section('breadcrumb')
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

  @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
    @section('breadcrumb-title')
      &nbsp; Invoice Details
    @endsection
    @section('breadcrumb-item')
      <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('orders.index') }}">Orders</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Order Details</strong>
      </li>
    @endsection
  @else
    <h1>Orders page</h1>
  @endif
@endsection

@section('content')
<div class="page-wrapper wrapper-content animated fadeInRight">
    <div class="ibox-content p-xl">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="text-right">Invoice No. - {{$order->id}}</h4>
            </div>
            <div class="col-sm-6">
                <br>
                <h6>Seller: </h6>
                <address>
                    <strong style="font-size: 24px;">{{$order->seller->name}}</strong>
                    <br>
                    {{$order->seller->head_office_address}}
                    <br>
                    Contact No: {{$order->seller->contact_number}}
                    <br>
                    Email Id: {{$order->seller->email}}
                    <br>
                    State Code: {{$order->seller->state_code}}
                    <br>
                    GST Number: {{$order->seller->gst_number}}
                    <br>
                    PAN Number: {{$order->seller->pan_number}}
                </address>
            </div>

            <div class="col-sm-6 text-right">
                <br>
                <h6>Buyer: </h6>
                <address>
                    <strong style="font-size: 24px;">{{$order->buyer->name}}</strong>
                    <br>
                    {{$order->buyer->address}}
                    <br>
                    Contact No:  {{$order->buyer->mobile}}
                    <br>
                    Email Id: {{$order->buyer->email}}
                    <br>
                    State Code: {{$order->buyer->state_code}}
                    <br>
                    GST Number: {{$order->buyer->gst_number}}
                </address>
                <br>
                <p>
                    <span><strong>Invoice Date:</strong> {{$order->order_date}}</span><br/>
                    <span><strong>Due Date:</strong> {{$order->due_date}}</span>
                </p>
            </div>
        </div>
        @php
            $subtotal = 0;
            $taxtotal = 0;
        @endphp
        <div class="table-responsive m-t">
            <table class="table table-bordered invoice-table">
                <thead>
                    <tr>
                        <th class="text-center align-middle" rowspan="2">Item List</th>
                        <th class="text-center align-middle" rowspan="2">HSN/SAC</th>
                        <th class="text-center align-middle" rowspan="2" >Quantity</th>
                        <th class="text-center align-middle" rowspan="2">Unit Price</th>
                        <th class="text-center align-middle" colspan="2">Integrated Tax (IGST)</th>
                        <th class="text-center align-middle" rowspan="2">Total Price</th>
                    </tr>
                    <tr>
                        <th class="text-center align-middle">Tax Rate</th>
                        <th class="text-center align-middle">Tax Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < sizeof($order->order->product_id); $i++)
                        <tr>
                            <td class="text-left">
                                <strong>{{$order->order->product_id[$i]}}</strong>
                            </td>
                            <td>
                                {{$order->order->hsn_code[$i]}}
                            </td>
                            <td>
                                <strong>{{$order->order->quantity[$i]}} {{$order->order->unit[$i]}}</strong>
                            </td>
                            <td>
                                <i class="fa fa-inr">&nbsp;{{$order->order->price_per_piece[$i]}}</i>
                            </td>
                            <td class="text-right">
                                {{$order->order->gst_percentage}}%</i>
                            </td>
                            <td class="text-right">
                                <i class="fa fa-inr">&nbsp;{{($order->order->price_per_piece[$i] * $order->order->gst_percentage)/100}}</i>
                            </td>
                            <td>
                                <i class="fa fa-inr">&nbsp;{{($order->order->price_per_piece[$i] + ($order->order->price_per_piece[$i] * $order->order->gst_percentage)/100) * $order->order->quantity[$i]}}</i>
                            </td>
                            @php
                                $subtotal += $order->order->price_per_piece[$i] * $order->order->quantity[$i];
                                $taxtotal += (($order->order->price_per_piece[$i] * $order->order->gst_percentage)/100) * $order->order->quantity[$i];
                            @endphp
                        </tr>
                    @endfor
                    @if($order->order->name_of_extra_cost)
                        @for($i = 0; $i < sizeof($order->order->name_of_extra_cost); $i++)
                            <tr>
                                <td class="text-right">
                                    <strong>{{$order->order->name_of_extra_cost[$i]}}</strong>
                                </td>
                                <td>
                                    {{$order->order->extra_hsn_code[$i]}}
                                </td>
                                <td>
                                    {{-- <strong>1 UNT</strong> --}}
                                </td>
                                <td>
                                    <i class="fa fa-inr">&nbsp;{{$order->order->extra_cost_price[$i]}}</i>
                                </td>
                                <td class="text-right">
                                    {{$order->order->gst_percentage}}%
                                </td>
                                <td class="text-right">
                                    <i class="fa fa-inr">&nbsp;{{($order->order->extra_cost_price[$i] * $order->order->gst_percentage)/100}}</i>
                                </td>
                                <td>
                                    <i class="fa fa-inr">&nbsp;{{$order->order->extra_cost_price[$i] + ($order->order->extra_cost_price[$i] * $order->order->gst_percentage)/100}}</i>
                                </td>
                            </tr>
                            @php
                                $subtotal += $order->order->extra_cost_price[$i];
                                $taxtotal += ($order->order->extra_cost_price[$i] * $order->order->gst_percentage)/100;
                            @endphp
                        @endfor
                    @endif
                    </tbody>
                </table>
            </div>
        @php
            $subtotal = round($subtotal,2);
            $taxtotal = round($taxtotal,2);
        @endphp
        <table class="table invoice-total ">
            <tbody>
                <tr>
                    <td>
                        <strong>Sub Total :</strong>
                    </td>
                    <td style="width:60%;">
                        <i class="fa fa-inr">&nbsp;{{$subtotal}}</i>
                        ( <strong>{{getIndianCurrency($subtotal)}}</strong>)
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>IGST Tax :</strong>
                    </td>
                    <td>
                        <i class="fa fa-inr">&nbsp;{{$taxtotal}}</i>
                        ( <strong>{{getIndianCurrency($taxtotal)}}</strong>)
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Sales Round Off :</strong>
                    </td>
                    <td>
                        <i class="fa fa-inr">&nbsp;{{round(round($subtotal + $taxtotal) - ($subtotal + $taxtotal),2)}}</i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Grand Total :</strong>
                    </td>
                    <td>
                        <i class="fa fa-inr">&nbsp;{{round($subtotal + $taxtotal)}}</i>
                        ( <strong>{{getIndianCurrency(round($subtotal + $taxtotal))}}</strong>)
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <strong>E. & O.E</strong>
                    </td>
                </tr>
            </tbody>
        </table>

        <br><br>


        <div class="row">
            <div class="col-sm-6">
                @if ($order->payment_status != 'completed')
                    <form action="{{$order->payment_link}}" method="get">
                        <button type="submit" class="btn btn-primary">Make Payment</button>
                    </form>
                @endif
            </div>
            <div class="text-right col-sm-6">
                <form action="{{URL::to('/create-pdf/'.$order->id)}}" method="get">
                    <button type="submit" class="btn btn-warning">
                        Download/Print Invoice
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
        <script>
            $(function() {
            $('.orders').addClass('active');
            $('.orders ul').addClass('in');
            $('.orders ul li:nth-child(2)').addClass('active');
            });
        </script>
    @endif
@endpush
