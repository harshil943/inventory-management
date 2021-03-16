@extends('layouts.app')

@section('title')
    Invoice Info | Bright Containers
@endsection

@section('breadcrumb')
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
                    {{-- @php
                        $add_arr = explode(",",$order->address);
                    @endphp
                    @foreach ($add_arr as $element)
                        {{$element}},
                        <br>
                    @endforeach
                    <br><br> --}}
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
            $subtotal1 = 0;
            $subtotal2 = 0;
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
                                @php
                                    $subtotal1 += ($order->order->price_per_piece[$i] + ($order->order->price_per_piece[$i] * $order->order->gst_percentage)/100) * $order->order->quantity[$i];
                                @endphp
                            </td>
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
                                    @php
                                        $subtotal2 += $order->order->extra_cost_price[$i] + ($order->order->extra_cost_price[$i] * $order->order->gst_percentage)/100;
                                    @endphp
                                </td>
                            </tr>
                        @endfor
                        {{-- <tr>
                            <td colspan="6" class="text-right" ><strong>Sub Total :</strong></td>
                            <td>
                                <i class="fa fa-inr">&nbsp;{{$subtotal2}}</i>
                            </td>
                        </tr> --}}
                    @endif
                    </tbody>
                </table>
            </div>
            {{-- <table class="table invoice-total">
                <tbody>
                    <tr>
                        <td><strong>Sub Total :</strong></td>
                        <td>
                            <i class="fa fa-inr">&nbsp;{{$subtotal1}}</i>
                        </td>
                    </tr>
                </tbody>
            </table> --}}
        <br>
        {{-- @if($order->order->name_of_extra_cost)
            <div class="table-responsive m-t">
                <table class="table invoice-table">
                    <thead>
                        <tr>
                            <th>Extra Cost List</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < sizeof($order->order->name_of_extra_cost); $i++)
                            <tr>
                                <td>
                                    <strong>{{$order->order->name_of_extra_cost[$i]}}</strong>
                                </td>
                                <td>
                                    <i class="fa fa-inr">&nbsp;{{$order->order->extra_cost_price[$i]}}</i>
                                    @php
                                        $subtotal2 += $order->order->extra_cost_price[$i];
                                    @endphp

                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <table class="table invoice-total">
                <tbody>
                    <tr>
                        <td><strong>Sub Total :</strong></td>
                        <td>
                            <i class="fa fa-inr">&nbsp;{{$subtotal2}}</i>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif --}}
        <table class="table invoice-total">
            <tbody>
                <tr>
                    <td><strong>Grand Total :</strong></td>
                    <td>
                        <i class="fa fa-inr">&nbsp;{{$subtotal1+ $subtotal2}}</i>
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
