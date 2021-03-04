@extends('layouts.app')

@section('title')
  Product Category | Bright Containers
@endsection

@section('content')
<div class="container wrapper wrapper-content animated fadeInRight">
  <div class="row">
@foreach ($data as $item)
    
<div class="contact-box center-version col-sm-3">
  <a href="{{url('productDetails',[$item->id])}}" style="text-decoration: none">
    <img alt="image" class="img" src="{{asset('img/a2.jpg')}}">
    <div class="contact-box-footer">
      <div class="m-t-xs btn-group">
        <h3>Brochure Name</h3>
      </div>
    </div>
  </a> 
</div>

@endforeach

  </div>
</div>
@endsection