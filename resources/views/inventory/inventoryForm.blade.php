@extends('layouts.app')

@section('title')
@if (isset($inventory))
    
Edit Inventory | Bright Containers
@else
    
Add Inventory | Bright Containers
@endif
@endsection

@push('css')
    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="gray-bg container">
    <div class="text-center loginscreen animated fadeInDown">
        <div class="mt-3">
            @if (isset($inventory))
                
            <h3>Edit Inventory to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('inventory.update',$inventory->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            @else
            <h3>Add Inventory to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            @endif
                    <div class="row text-left">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label" for="product">Product</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="product" name="product" required>
                                            <option></option>
                                            @foreach ($product as $item)
                                            @if (isset($inventory))
                                            <option value="{{$item->id}}" selected>{{$item->product_name}}</option>
                                            @else
                                            <option value="{{$item->id}}">{{$item->product_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Quantity</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="quantity" @if (isset($inventory->quantity))
                                            value="{{$inventory->quantity}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Cost Per Product</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="cost" @if (isset($inventory->cost_per_product))
                                            value="{{$inventory->cost_per_product}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($inventory))
                        
                    <button type="submit" class="btn btn-primary">Edit Inventory</button>
                    @else
                        
                    <button type="submit" class="btn btn-primary">Add Inventory</button>
                    @endif
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
    {{-- Select 2 JS --}}
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $("#product").select2({
                placeholder: "Select Product",
                allowClear: true
            });
        });
    </script>
<script>
    $(function() {
        $('.inventory').addClass('active');
        $('.inventory ul').addClass('in');
        $('.inventory ul li:nth-child(1)').addClass('active');
    });
</script>
@endpush