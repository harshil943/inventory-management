@extends('layouts.app')

@section('title')
    Order Details | Bright Containers
@endsection

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox-content p-xl">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="text-right">Invoice No. - {{$order->id}}</h4>
                </div>

                <div class="col-sm-6">
                    <br>
                    <h5>From: </h5>
                    <address>
                        <strong>{{$bright->name}}</strong><br>
                        @php
                            $add_arr = explode(",",$bright->head_office_address);
                        @endphp
                        @foreach ($add_arr as $element)
                            {{$element}},
                            <br>
                        @endforeach
                        <br><br>
                        Contact No: {{$bright->contact_number}}
                        <br>
                        Email Id: {{$bright->email}}
                        <br>
                        GST Number: {{$bright->gst_number}}
                    </address>
                </div>
                <div class="col-sm-6 text-right">
                    <br>
                    <h5>To: </h5>
                    <address>
                        <strong>{{$order->name}}</strong><br>
                        @php
                            $add_arr = explode(",",$order->address);
                        @endphp
                        @foreach ($add_arr as $element)
                            {{$element}},
                            <br>
                        @endforeach
                        <br><br>
                        Contact No:  {{$order->mobile}}
                        <br>
                        Email Id: {{$order->email}}
                        <br>
                        GST Number: {{$order->gst_number}}
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
                <table class="table invoice-table">
                    <thead>
                        <tr>
                            <th>Item List</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Tax (Per Piece)</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < sizeof($order->product_id); $i++)
                            <tr>
                                <td>
                                    <strong>{{$order->product_id[$i]}}</strong>
                                </td>
                                <td>
                                    {{$order->quantity[$i]}}
                                </td>
                                <td>
                                    <i class="fa fa-inr">{{$order->price_per_piece[$i]}}</i>
                                </td>
                                <td>
                                    <i class="fa fa-inr">{{($order->price_per_piece[$i] * $bright->gst_percentage)/100}}</i>
                                </td>
                                <td>
                                    <i class="fa fa-inr">{{($order->price_per_piece[$i] + ($order->price_per_piece[$i] * $bright->gst_percentage)/100) * $order->quantity[$i]}}</i>
                                    @php
                                        $subtotal1 += ($order->price_per_piece[$i] + ($order->price_per_piece[$i] * $bright->gst_percentage)/100) * $order->quantity[$i];
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
                                <i class="fa fa-inr">{{$subtotal1}}</i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <br>
            @if($order->name_of_extra_cost != NULL)
                <div class="table-responsive m-t">
                    <table class="table invoice-table">
                        <thead>
                            <tr>
                                <th>Extra Cost List</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < sizeof($order->name_of_extra_cost); $i++)
                                <tr>
                                    <td>
                                        <strong>{{$order->name_of_extra_cost[$i]}}</strong>
                                    </td>
                                    <td>
                                        <i class="fa fa-inr">{{$order->extra_cost_price[$i]}}</i>
                                        @php
                                            $subtotal2 += $order->extra_cost_price[$i];
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
                                <i class="fa fa-inr">{{$subtotal2}}</i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endif
            <table class="table invoice-total">
                <tbody>
                    <tr>
                        <td><strong>Total :</strong></td>
                        <td>
                            <i class="fa fa-inr">{{$subtotal1+ $subtotal2}}</i>
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
    <script>
        $(function() {
            $('.employee').addClass('active');
        });
    </script>
@endpush
