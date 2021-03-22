@extends('layouts.app')

@section('title')
    Product Details | Bright Containers
@endsection

@push('css')
    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="ibox-content">
    <div class="row">
        <div class="col-md-5">
          <img src="{{asset('img/'.$product->product_image_name)}}" alt="Product Image">
        </div>
        <div class="col-md-7">
            <h2 class="font-bold m-b-xs" style="color:#007c89">       
                {{$product->product_name}}
            </h2>
            <hr>
            <div>
              <ul class="p-2">
                <li class="my-2">{{$product->product_info_1}}</li>
                <li> <span class="text-danger my-2"> Available Sizes : </span> {{$product->available_sizes}}</li>
                <li> <span class="text-danger my-2"> Available Colors : </span> {{$product->available_color_bottle}}</li>
                <li> <span class="text-danger my-2"> Available Cap Colors : </span> {{$product->available_color_cap}}</li>
              </ul>
            </div>
          </div>
    </div>
</div>
<div class="mt-5 container-fluid">
  <h1 class="mb-3" style="color:#007c89">Dimentions Table</h1>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">Shape/Size</th>
        <th scope="col">Brimful Capacity (ml)</th>
        <th scope="col">Height with Cap (mm)</th>
        <th scope="col">Length / Diameter (mm)</th>
        <th scope="col">Thickness (mm)</th>
        <th scope="col">Label Height (mm)</th>
        <th scope="col">Neck Id (mm)</th>
        <th scope="col">Standard Weight (gms)</th>
        <th scope="col">MOQ <span style="color:red;">*</span> (Pcs)</th>
        <th scope="col">Cap Name</th>
      </tr>
    </thead>
    @php
        $table_header = json_decode($product->table_header);
        $brimful = json_decode($product->brimful_capacity);
        $height = json_decode($product->height);
        $lenght = json_decode($product->length);
        $thickness = json_decode($product->thickness);
        $label_height = json_decode($product->label_height);
        $neck_id = json_decode($product->neck_id);
        $standard_weight = json_decode($product->standard_weight);
        $moq = json_decode($product->MOQ);
        $cap_name = json_decode($product->cap_name);
    @endphp
    <tbody>
      @for ($i = 0; $i < count($table_header); $i++)    
      <tr>
        <th scope="row">{{$table_header[$i]}}</th>
        <td>{{$brimful[$i]}}</td>
        <td>{{$height[$i]}}</td>
        <td>{{$lenght[$i]}}</td>
        <td>{{$thickness[$i]}}</td>
        <td>{{$label_height[$i]}}</td>
        <td>{{$neck_id[$i]}}</td>
        <td>{{$standard_weight[$i]}}</td>
        <td>{{$moq[$i]}}</td>
        <td>{{$cap_name[$i]}}</td>
      </tr>
      @endfor
    </tbody>
  </table>
  <h5><span class="text-danger">MOQ - Minimum Order Quantity</span></h5>
</div>
<div class="text-center" style="color:#007c89">
  <h1>₹ Request Quotation</h1>
</div>
<div class="container mt-5">
  <form class="m-t mt-3" role="form"  action="{{ route('quotation') }}" method="POST">
    @csrf
    <div class="row text-left">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label fa fa-id-card" for="comapny name">  Company Name</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="company_name" placeholder="Comapny Name" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label fa fa-envelope" for="comapny name">  Email Address</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="email" placeholder="Email Address" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label fa fa-phone" for="comapny name">  Contact Number</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="number" placeholder="Contact Number" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label fa fa-product-hunt" for="product size">  Product Size</label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control" id="size" name="size" required>
                            <option></option>
                            @foreach ($table_header as $item)
                            <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-sm-4">
                      <label class="form-label fa fa-tasks" for="comapny name">  Quantity</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="quantity" placeholder="Quantity" required>
                  </div>
              </div>
          </div>
        </div>
    </div>
    
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary m-b">Get Quoatation</button>
    </div>
    
</form>
</div>
@endsection


@push('script')
     {{-- Select 2 JS --}}
     <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>

    
     <script>
         $(document).ready(function(){
             $("#size").select2({
                 placeholder: "Select Size",
                 allowClear: true
             });
         });
        </script>
         
@endpush