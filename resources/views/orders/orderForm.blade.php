{{-- {{dd($order->order)}} --}}
@extends('layouts.app')

@section('title')
    @if (isset($order))
       Edit Order | Bright Containers
    @else
        Add Order | Bright Containers
    @endif
@endsection

@push('css')
    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">

    <style>
        .onoffswitch-inner::before {
            content: "Yes";
        }

        .onoffswitch-inner::after {
            content: "No";
        }
    </style>
@endpush

@if (isset($order))
    @section('breadcrumb')
        @section('breadcrumb-title')
            &nbsp; Edit Order
        @endsection
        @section('breadcrumb-item')
            <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
            <strong>Edit Order</strong>
            </li>
        @endsection
    @endsection
@else
    @section('breadcrumb')
    @section('breadcrumb-title')
        &nbsp; Add Order
    @endsection
    @section('breadcrumb-item')
        <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">
        <strong>Add Order</strong>
        </li>
    @endsection
    @endsection

@endif


@section('content')
<div class="container">

    <div class="text-center animated fadeInDown my-5 p-3 white-bg" style="padding:10px;">
        <div class="mt-3 p-5 border border-rounded border-primary">
        @if (isset($order))
        <form class="m-t mt-3" role="form"  action="{{ route('orderupdate',$order->id) }}">
            @csrf
            @method('PATCH')
            @else
            <form class="m-t mt-3" role="form"  action="{{ route('orders.orderCreate') }}" method="POST">
                @csrf
                @endif
                <div class="row text-left">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label" for="buyer_id">Buyer</label>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control" id="buyer_id" name="buyer_id" required>
                                        <option></option>
                                        @foreach ($buyer as $item)
                                        @if (isset($order))
                                                 @if ($item->id == $order->buyer_id)
                                                 <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                 @else
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endif
                                                    @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label" for="consignee_id">Consignee</label>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control" id="consignee_id" name="consignee_id">
                                        <option></option>
                                        @foreach ($consignee as $item)
                                            @if (isset($order))
                                            @if ($item->id == $order->consignee_id)
                                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                    @else
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endif
                                            @else
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label" for="vehical_number">Vehical Number</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Vehical Number" name="vehical_number" id='vehical_number' @if (isset($order))
                                    value="{{$order->vehical_number}}"
                                    @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label" for="buyer_order_number">Buyer's Order <br> Number</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Buyer Order Number" name="buyer_order_number" id='buyer_order_number' @if (isset($order))
                                    value="{{$order->order->buyer_order_number}}"
                                    @endif required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="e_way_bill_number">E-way Bill Number</label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="e_way_bill_number" type="text" name="e_way_bill_number" class="form-control" placeholder="E-way Bill Number" @if (isset($order))
                                    value="{{$order->order->e_way_bill_number}}"
                                    @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="order_date">Order Date</label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="order_date" type="date" name="order_date" class="form-control" placeholder="Order Date" @if (isset($order))
                                    value="{{$order->order_date}}"
                                    @endif required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="shipping_date">Shipping Date</label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="shipping_date" type="date" name="shipping_date" class="form-control" placeholder="Shipping Date" @if (isset($order))
                                    value="{{$order->shipping_date}}"
                                    @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="igst">IGST Applicable</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="igst" class="onoffswitch-checkbox" id="igst">
                                        <label class="onoffswitch-label" for="igst">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label" for="order_status">Order Status</label>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control" id="order_status" name="order_status" required>
                                        <option></option>
                                        @if (isset($order))
                                        <option value="{{$order->order_status}}" selected>{{$order->order_status}}</option>
                                        <option value="pending">Pending</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                        @else
                                        <option value="pending">Pending</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="payment_status">Payment Status</label>
                                </div>
                                <div class="col-sm-8">
                                    <select class="form-control" id="payment_status" name="payment_status" required>
                                        <option></option>
                                        @if (isset($order))
                                        <option value="{{$order->payment_status}}" selected>{{$order->payment_status}}</option>
                                        <option value="pending">Pending</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                        @else
                                        <option value="pending">Pending</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="dispatch_mathod">Dispatch Method</label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="dispatch_mathod" type="text" name="dispatch_method" class="form-control" placeholder="Dispatch Method" @if (isset($order))
                                    value="{{$order->dispatch_method}}"
                                    @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label" for="LR_number">LR Number</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="LR Number" name="LR_number" id='LR_number' @if (isset($order))
                                    value="{{$order->lr_number}}"
                                    @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="dispatch_document_number">Dispatch Document Number</label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="dispatch_document_number" type="text" name="dispatch_document_number" class="form-control" placeholder="Dispatch Document Number" @if (isset($order))
                                    value="{{$order->dispatch_document_number}}"
                                    @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="paymnet_link">Payment Link</label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="paymnet_link" type="text" class="form-control" name="payment_link" placeholder="Payment Link" @if (isset($order))
                                    value="{{$order->order->payment_link}}"
                                    @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="due_date">Due Date</label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="due_date" type="date" class="form-control" name="due_date" placeholder="Due Date" @if (isset($order))
                                    value="{{$order->due_date}}"
                                    @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-5">
                    <span class="fa fa-plus btn btn-success" id="add_product">
                        Add Products
                    </span>
                    <span class="btn btn-danger remove_product fa fa-minus"> Remove</span>
                    <div class="my-5">
                        <div class="row text-left">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="product_id">Product Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control product_id" id="product_id" name="product_id[]" required>
                                                <option></option>
                                                @foreach ($product as $item)
                                                <option value="{{$item->id}}">{{$item->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="unit">Unit</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control unit" id="unit" name="unit[]" required>
                                                <option></option>
                                                <option value="UNT">UNT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="hsn_code">HSN Code</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control hsn_code" id="hsn" name="hsn[]" required>
                                                <option></option>
                                                <option value="32233233">32233233</option>
                                                <option value="7664646">7664646</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="quantity">Quantity</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="quantity[]" id="quantity" class="form-control" placeholder="Quantity" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="price">Price</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="price[]" id="price"class="form-control" placeholder="Price" required>
                                        </div>
                                    </div>
                                </div></div>
                    </div>
                    <div class="add-product-area mt-5">

                    </div>
                    <hr>
                    <div class="mb-5">
                        <span class="fa fa-plus btn btn-success" id="add-extras">
                            Add Extra Details
                        </span>
                        <span class="btn btn-danger remove_extra fa fa-minus"> Remove</span>
                    </div>
                    <div class="my-5">
                    <div class="row text-left">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label class="form-label" for="name_of_extra_cost">Name Of Extra Cost</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name_of_extra_cost[]" id="name_of_extra_cost" placeholder="Name Of Extra Cost">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label class="form-label" for="extra_hsn_code">Extra HSN Code</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <select class="form-control extra_hsn_code" id="extra_hsn_code" name="extra_hsn_code[]" >
                                                <option></option>
                                                <option value="32233233">32233233</option>
                                                <option value="7664646">7664646</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label class="form-label" for="extra_cost">Extra Cost</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" name="extra_cost[]" id="extra_cost"class="form-control" placeholder="Extra Cost">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-extra-area mt-5">

                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary m-b">Done Order</button>
                </div>
        </form>
    </div>
</div>
</div>

@endsection

@push('script')
{{-- Select 2 JS --}}
<script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>

<script>
        $(function() {
            $('.orders').addClass('active');
            $('.orders ul').addClass('in');
            $('.orders ul li:nth-child(1)').addClass('active');
        });
    </script>

{{-- Country Code JS --}}
     <script>
         $(document).ready(function(){
             $("#buyer_id").select2({
                 placeholder: "Select Buyer",
                 allowClear: true
             });
             $("#consignee_id").select2({
                 placeholder: "Select Consignee",
                 allowClear: true
             });
             $("#order_status").select2({
                 placeholder: "Select Order Status",
                 allowClear: true
             });
             $("#payment_status").select2({
                 placeholder: "Select Payment Status",
                 allowClear: true
             });
        });
     </script>
     <script>
            // const url = '/country';
            //     window.onload = async function() {
            //     const response = await fetch(url);
            //     window.data = await response.json();
            //     conData = data;
            //     for (var i = 0; i < conData.length; i++) {
            //         var newOption = new Option(conData[i]['Iso']+" - "+conData[i]['name'],conData[i]['Iso'], false, false);
            //         // var newOption = new Option(conData[i]["State Code"]+" - "+conData[i]["State Name"],conData[i]["State Code"], false, false);
            //         $('#buyer_id').append(newOption);
            //     }
            //     $('#buyer_id').trigger('change');
            }
            // const url = '/hsn';
            //     window.onload = async function() {
            //     const response = await fetch(url);
            //     window.data = await response.json();
            //     conData = data;
            //     for (var i = 0; i < conData.length; i++) {
            //         var newOption = new Option(conData[i]["HSC Code"]+" - "+conData[i]["HSC Description"],conData[i]["HSC Code"], false, false);
            //         $('#hsn').append(newOption);
            //     }
            //     $('#hsn').trigger('change');
            // }
            // const url = '/unit';
            //     window.onload = async function() {
            //     const response = await fetch(url);
            //     window.data = await response.json();
            //     conData = data;
            //     for (var i = 0; i < conData.length; i++) {
            //         var newOption = new Option(conData[i]["Unit Code"]+" - "+conData[i]["Unit Description"],conData[i]["Unit Code"], false, false);
            //         $('#buyer_id').append(newOption);
            //     }
            //     $('#buyer_id').trigger('change');
            // }
     </script>
    <script>

            $('#add_product').click(function(){
                $('.add-product-area').append(`<div id="product"><hr><div class="row text-left">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="product_id">Product Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control product_id" id="product_id" name="product_id[]" required>
                                                <option></option>
                                                @foreach ($product as $item)
                                                <option value="{{$item->id}}">{{$item->product_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="unit">Unit</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control unit" id="unit" name="unit[]" required>
                                                <option></option>
                                                <option value="UNT">UNT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="hsn_code">HSN Code</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control hsn_code" id="hsn" name="hsn[]" required>
                                                <option></option>
                                                <option value="32233233">32233233</option>
                                                <option value="7664646">7664646</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="quantity">Quantity</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="quantity[]" id="quantity" class="form-control" placeholder="Quantity" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="price">Price</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="price[]" id="price"class="form-control" placeholder="Price" required>
                                        </div>
                                    </div>
                                </div></div>
                        </div>`)
                        $(".product_id").select2({
                placeholder: "Select Product",
                allowClear: true
             });
             $(".unit").select2({
                 placeholder: "Select Unit",
                 allowClear: true
             });
             $(".hsn_code").select2({
                 placeholder: "Select HSN Code",
                 allowClear: true
             });
            });
            $(".product_id").select2({
                placeholder: "Select Product",
                allowClear: true
             });
             $(".unit").select2({
                 placeholder: "Select Unit",
                 allowClear: true
             });
             $(".hsn_code").select2({
                 placeholder: "Select HSN Code",
                 allowClear: true
             });
            $('#add-extras').click(function(){
                $('.add-extra-area').append(`<div id="extra"><div class="row text-left">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label class="form-label" for="name_of_extra_cost">Name Of Extra Cost</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name_of_extra_cost[]" id="name_of_extra_cost" placeholder="Name Of Extra Cost">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label class="form-label" for="extra_hsn_code">Extra HSN Code</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <select class="form-control extra_hsn_code" id="extra_hsn_code" name="extra_hsn_code[]" >
                                                <option></option>
                                                <option value="32233233">32233233</option>
                                                <option value="7664646">7664646</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label class="form-label" for="extra_cost">Extra Cost</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" name="extra_cost[]" id="extra_cost"class="form-control" placeholder="Extra Cost">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>`)
                        $(".extra_hsn_code").select2({
                 placeholder: "Select Extra HSN Code",
                 allowClear: true
             });
            });
             $(".extra_hsn_code").select2({
                 placeholder: "Select Extra HSN Code",
                 allowClear: true
             });
            $('.remove_product').click(function(){
                $('#product').remove();
            });
            $('.remove_extra').click(function(){
                $('#extra').remove();
            });
        </script>
        <script>
            const url = '/country';
                    window.onload = async function() {
                    const response = await fetch(url);
                    window.data = await response.json();
                    conData = data;
                    for (var i = 0; i < conData.length; i++) {
                        var newOption = new Option(conData[i]['Iso']+" - "+conData[i]['name'],conData[i]['Iso'], false, false);
                        // var newOption = new Option(conData[i]["State Code"]+" - "+conData[i]["State Name"],conData[i]["State Code"], false, false);
                        $('#hsn').append(newOption);
                    }
                    $('#hsn').trigger('change');
                }
    </script>
@endpush

