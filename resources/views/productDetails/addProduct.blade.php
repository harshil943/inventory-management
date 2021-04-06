{{-- {{dd($product)}} --}}
@extends('layouts.app')

@section('title')
@if (isset($product))

Edit Product | Bright Containers
@else

Add Product | Bright Containers
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
            @if (isset($product))

            <h3>Edit Product to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            @else

            <h3>Add Product to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            @endif

                    <div class="row text-left">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label" for="category">Category</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="category" name="category" @if(isset($product->category)) value="{{$product->category}}" @endif required>
                                            <option></option>
                                            @foreach ($category as $item)
                                             @if (isset($product))
                                                 @if ($item->id == $product->category_id)
                                                    <option value="{{$item->id}}" selected>{{$item->category_name}}</option>
                                                 @else
                                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                                 @endif
                                             @else
                                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                             @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label" for="product_name">Product Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="Product Name" name="product_name" id='product_name' @if(isset($product->product_name)) value="{{$product->product_name}}" @endif required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="available_color_bottle">Available Color Bottle</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="available_color_bottle" type="text" name="available_color_bottle" @if(isset($product->available_color_bottle)) value="{{$product->available_color_bottle}}" @endif class="form-control" placeholder="Available Color Bottle" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="product_info_1">Product Info 1</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="product_info_1" type="text" name="product_info_1" class="form-control" @if(isset($product->product_info_1)) value="{{$product->product_info_1}}" @endif placeholder="Product Info"  >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="extra_info_1">Extra Info 1</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="extra_info_1" type="text" name="extra_info_1" class="form-control" @if(isset($product->extra_info_1)) value="{{$product->extra_info_1}}" @endif placeholder="extra Info" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="extra_info_3">Extra Info 3</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="extra_info_3" type="text" name="extra_info_3" class="form-control" @if(isset($product->extra_info_3)) value="{{$product->extra_info_3}}" @endif placeholder="extra Info" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label" for="visible">Filter Type</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="visible" name="visible" @if(isset($product->visible)) value="{{$product->visible}}" @endif required>
                                            <option></option>
                                            @if (isset($product))
                                                @if ($product->product_visible == '0')

                                                    <option value="0" selected>0</option>
                                                    <option value="1">1</option>
                                                @else

                                                    <option value="0">0</option>
                                                    <option value="1" selected>1</option>
                                                @endif
                                            @else

                                                <option value="0">0</option>
                                                <option value="1" >1</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="available_sizes">Available Sizes</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="available_sizes" type="text" name="available_sizes" class="form-control" @if(isset($product->available_sizes)) value="{{$product->available_sizes}}" @endif placeholder="Available Sizes" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="available_color_cap">Available Color Cap</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="available_color_cap" type="text" name="available_color_cap" class="form-control" @if(isset($product->available_color_cap)) value="{{$product->available_color_cap}}" @endif placeholder="Available Color Cap" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="product_info_2">Product Info 2</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="product_info_2" type="text" name="product_info_2" class="form-control" @if(isset($product->product_info_2)) value="{{$product->product_info_2}}" @endif placeholder="Product Info"  >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="extra_info_2">Extra Info 2</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="extra_info_2" type="text" name="extra_info_2" class="form-control" @if(isset($product->extra_info_2)) value="{{$product->extra_info_2}}" @endif placeholder="extra Info" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="extra_info_4">Extra Info 4</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="extra_info_4" type="text" name="extra_info_4" class="form-control" @if(isset($product->extra_info_4)) value="{{$product->extra_info_4}}" @endif placeholder="extra Info" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Product Image</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="product_image" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <span class="fa fa-plus btn btn-success" id="more_details">
                            More Details
                        </span>
                        <span class="btn btn-danger remove_details fa fa-minus"> Remove</span>
                    <div class="more-details-area mt-5">
                        @if (isset($product->table_header))
                        @php
                            $table_header = json_decode($product->table_header);
                            $brimful_capacity = json_decode($product->brimful_capacity);
                            $height = json_decode($product->height);
                            $length = json_decode($product->length);
                            $thickness = json_decode($product->thickness);
                            $label_height = json_decode($product->label_height);
                            $neck_id = json_decode($product->neck_id);
                            $standard_weight = json_decode($product->standard_weight);
                            $MOQ = json_decode($product->MOQ);
                            $cap_name = json_decode($product->cap_name);
                        @endphp
                                @for ($i=0; $i <count($table_header) ; $i++)


                                <div id="detail">
                                <hr>
                                <div class="row text-left">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="form-label" for="table_header">Table Header</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Table Header" name="table_header[]" id='table_header' value="{{$table_header[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="height">Height</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="height" type="text" name="height[]" class="form-control" placeholder="Height" value="{{$height[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="thickness">Thickness</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="thickness" type="text" name="thickness[]" class="form-control" placeholder="Thickness" value="{{$thickness[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="neck_id">Neck Id</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="neck_id" type="text" name="neck_id[]" class="form-control" placeholder="Neck Id" value="{{$neck_id[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="MOQ">MOQ</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="MOQ" type="text" name="MOQ[]" class="form-control" placeholder="Min Order Quantity" value="{{$MOQ[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="brimful_capacity">Brimful Capacity</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="brimful_capacity" type="text" name="brimful_capacity[]" class="form-control" placeholder="Brimful Capacity" value="{{$brimful_capacity[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="length">Length</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="length" type="text" name="length[]" class="form-control" placeholder="Length" value="{{$length[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="label_height">Label Height</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="label_height" type="text" name="label_height[]" class="form-control" placeholder="Label Height" value="{{$label_height[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="standard_weight">Standard Weight</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="standard_weight" type="text" name="standard_weight[]" class="form-control" placeholder="Standard Weight" value="{{$standard_weight[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="cap_name">Cap Name</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="cap_name" type="text" name="cap_name[]" class="form-control" placeholder="Cap Name" value="{{$cap_name[$i]}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                                @endfor

                        @endif
                    </div>
                    </div>
                    <div>
                        @if (isset($product))

                        <button type="submit" class="btn btn-primary m-b">Edit Product</button>
                        @else

                        <button type="submit" class="btn btn-primary m-b">Add Product</button>
                        @endif
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
        {{-- Select 2 JS --}}
     <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
     {{-- Country Code JS --}}
<script>
         $(document).ready(function(){
             $("#category").select2({
                 placeholder: "Select Category",
                 allowClear: true
             });
             $("#visible").select2({
                 placeholder: "Select Filter",
                 allowClear: true
             });
        });
        $('#more_details').click(function(){
            $('.more-details-area').append(`<div id="detail"><hr>
                    <div class="row text-left">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label" for="table_header">Table Header</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="Table Header" name="table_header[]" id='table_header'>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="height">Height</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="height" type="text" name="height[]" class="form-control" placeholder="Height" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="thickness">Thickness</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="thickness" type="text" name="thickness[]" class="form-control" placeholder="Thickness" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="neck_id">Neck Id</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="neck_id" type="text" name="neck_id[]" class="form-control" placeholder="Neck Id" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="MOQ">MOQ</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="MOQ" type="text" name="MOQ[]" class="form-control" placeholder="Min Order Quantity" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="brimful_capacity">Brimful Capacity</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="brimful_capacity" type="text" name="brimful_capacity[]" class="form-control" placeholder="Brimful Capacity" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="length">Length</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="length" type="text" name="length[]" class="form-control" placeholder="Length" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="label_height">Label Height</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="label_height" type="text" name="label_height[]" class="form-control" placeholder="Label Height" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="standard_weight">Standard Weight</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="standard_weight" type="text" name="standard_weight[]" class="form-control" placeholder="Standard Weight" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="cap_name">Cap Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="cap_name" type="text" name="cap_name[]" class="form-control" placeholder="Cap Name" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>`)
        });
        $('.remove_details').click(function(){
                $('#detail').remove();
            });
     </script>
<script>
    $(function() {
        $('.product').addClass('active');
        $('.product ul').addClass('in');
        $('.product ul li:nth-child(1)').addClass('active');
    });
</script>
@endpush
