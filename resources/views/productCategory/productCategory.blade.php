@extends('layouts.app')

@section('title')
  Product Category | Bright Containers
@endsection

@section('content')
<br>
<form action="{{url('brochure',[$data[0]->category_id])}}" method="get" style="padding-left:60px;">
    <button type="submit" class="btn btn-primary" style="display:block;width:15%;">
        <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;
        Show Brochure
    </button>
</form>
<div class="container-fluid wrapper wrapper-content animated fadeInRight">
<div class="row">
@foreach ($data as $item)
<div class="contact-box center-version mx-auto col-sm-3 border border-dark rounded-0">
  <a href="{{url('productDetails',[$item->id])}}" style="text-decoration: none">
    <img alt="image" class="img w-100" style="height: 250px" src="{{asset('storage/product/'.$item->product_image_name)}}">
    <div class="contact-box-footer">
      <div class="m-t-xs btn-group">
        <h3 class="text-primary">{{$item->product_name}}</h3>
      </div>
    </div>
  </a>
</div>

@endforeach

  </div>
</div>
@endsection

@push('script')
    <script>
        $(function() {
            $('.product').addClass('active');
            $('.product').addClass('btn-rounded');
            $('.product').addClass('blue-bg');
            $(".product .nav-link").css("color","#fff");
        });
    </script>
@endpush
