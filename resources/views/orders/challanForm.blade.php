{{-- {{dd($map)}} --}}
@extends('layouts.app')

@section('title')
    @if (isset($challan))
        Edit Challan | Bright Containers
    @else
        Add Challan | Bright Containers
    @endif
@endsection

@push('css')
    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endpush

@if (isset($challan))
    @section('breadcrumb')
    @section('breadcrumb-title')
    &nbsp; Edit Challan
    @endsection
    @section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Challan</strong>
    </li>
    @endsection
    @endsection

@else
    @section('breadcrumb')
    @section('breadcrumb-title')
    &nbsp; Add Challan
    @endsection
    @section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add Challan</strong>
    </li>
    @endsection
@endsection

@endif

@section('content')
<div class="container">

    <div class="text-center animated fadeInDown my-5 p-3 white-bg" style="padding:10px;">
        <div class="mt-3 p-5 border border-rounded border-primary">
        @if (isset($challan))
        <form class="m-t mt-3" role="form" action="{{route('orders.challanCreate',[$map])}}">
            @csrf
            @method('PATCH')
        @else
        <form class="m-t mt-3" role="form" action="{{route('orders.challanCreate',[$map])}}" method="post">
            @csrf
            @endif
            <div class="row text-left">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4 mt-2">
                                <label class="form-label" for="total_no_packages">Total Packages</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Total Number of packages" name="total_no_packages" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4 mt-2">
                                    <label for="dispatch_mathod">Extra Note</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="extra_note" class="form-control" placeholder="Extra Note">
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
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="quantity">Bundle</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="bundle[]" class="form-control" placeholder="Bundle" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="cap">Is Cap</label>
                                        </div>
                                        <div class="col-sm-8">
                                                <select name="cap[]" id="cap">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="unit">Color</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="color[]"  class="form-control" placeholder="Color" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="price">Pack Size</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="pack_size[]" class="form-control" placeholder="Pack Size" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="add-product-area mt-5">

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
            $('.orders ul li:nth-child(2)').addClass('active');
        });
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
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="quantity">Bundle</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="bundle[]" class="form-control" placeholder="Bundle" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="igst">Is Cap</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="col-sm-8">
                                                <select name="cap[]" id="cap">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="unit">Color</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="color[]"  class="form-control" placeholder="Color" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="price">Pack Size</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="pack_size[]" class="form-control" placeholder="Pack Size" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>`)
                        $(".product_id").select2({
                            placeholder: "Select Product",
                            allowClear: true
                        });
            });
            $(".product_id").select2({
                placeholder: "Select Product",
                allowClear: true
             });


            $('.remove_product').click(function(){
                $('#product').remove();
            });
        </script>
@endpush

