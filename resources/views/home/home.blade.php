{{-- {{dd($products)}} --}}
@extends('layouts.app')

@section('title')
    Home | Bright Containers
@endsection

@section('content')

<div class="container-fluid hero-image" style="background-image: linear-gradient(to top,#3490dc,#fff 90%);">
    <div class="row">
        <div class="explore-more fade_effect  animated fadeInUp col-sm-4 my-auto">
            <h2>
                <span>Our Strengths</span>
                <br><br>
                <ul>
                    <li> Center, Off Center &amp; Angle Neck Production Facility. </li>
                    <br>
                    <li> 25ml bottle to 5ltr Jerry Can </li>
                </ul>
            </h2>

        </div>
        <div class="col-sm-8 home_image">
            <img src="{{ asset('img/Home_Page.png')}}" class="w-100" alt="Mixed Bottles Image">
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        @foreach ($products as $item)
            <div class="col-sm-4">
                {{-- <div class="ibox-content product-box animated shake infinite"> --}}
                <div class="ibox-content product-box">
                    <a href="{{route('productdetails',$item->id)}}" style="text-decoration:none;">
                    <img src="{{ asset('storage/product/'.$item->product_image_name) }}" alt="Product Image" class="img-fluid" style="height: 300px">
                    <div class="product-desc">
                        <center>
                            <h2 class="text-primary">{{$item->product_name}}</h2>
                        </center>
                    </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<br><br><br><br>
@endsection

@push('script')
    <script>
        $(function() {
            $('.home').addClass('active');
            $('.home').addClass('btn-rounded');
            $('.home').addClass('blue-bg');
            $(".home a").css("color","#fff");
        });
    </script>
@endpush
