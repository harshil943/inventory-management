@extends('layouts.app')

@section('title')
  Product Category | Bright Containers
@endsection

@section('content')
<div class="container-fluid wrapper wrapper-content animated fadeInRight">
<div class="row">
@foreach ($data as $item)
    
<div class="contact-box center-version  mx-auto col-sm-3 border border-dark rounded-0">
  <a href="{{url('productDetails',[$item->id])}}" style="text-decoration: none">
    <img alt="image" class="img w-100" style="height: auto" src="{{asset('img/'.$item->product_image_name)}}">
    <div class="contact-box-footer">
      <div class="m-t-xs btn-group">
        <h3>{{$item->product_name}}</h3>
      </div>
    </div>
  </a> 
</div>

@endforeach

  </div>
</div>
@endsection