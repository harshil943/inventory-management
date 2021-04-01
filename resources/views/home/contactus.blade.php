@extends('layouts.app')

@section('title')
    Home | Bright Containers
@endsection

@section('content')

<div class="container-fluid hero-image" style="background-image: linear-gradient(to bottom right,#0997a7,white 85%);">
    <div class="row">
        <div class="explore-more fade_effect animated fadeInUpBig col-sm-4 my-auto" style="font-family: URW Chancery L, cursive">
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
<div class="container-fluid mt-5">

    <div class="row">
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                        <img src="{{asset("img/grid1.png")}}" alt="Product Image" class="img-thumbnail img-fluid">
                    <div class="product-desc">
                        <span class="product-price">
                            $10
                        </span>
                        <small class="text-muted">Category</small>
                        <a href="#" class="product-name"> Product</a>
                        <div class="small m-t-xs">
                            Many desktop publishing packages and web page editors now.
                        </div>
                        <div class="m-t text-righ">
                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                        <img src="{{asset("img/grid2.png")}}" alt="Product Image" class="img-thumbnail img-fluid">
                    <div class="product-desc">
                        <span class="product-price">
                            $10
                        </span>
                        <small class="text-muted">Category</small>
                        <a href="#" class="product-name"> Product</a>
                        <div class="small m-t-xs">
                            Many desktop publishing packages and web page editors now.
                        </div>
                        <div class="m-t text-righ">
                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                        <img src="{{asset("img/grid3.png")}}" alt="Product Image" class="img-thumbnail img-fluid">
                    <div class="product-desc">
                        <span class="product-price">
                            $10
                        </span>
                        <small class="text-muted">Category</small>
                        <a href="#" class="product-name"> Product</a>
                        <div class="small m-t-xs">
                            Many desktop publishing packages and web page editors now.
                        </div>
                        <div class="m-t text-righ">
                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                        <img src="{{asset("img/grid4.png")}}" alt="Product Image" class="img-thumbnail img-fluid">
                    <div class="product-desc">
                        <span class="product-price">
                            $10
                        </span>
                        <small class="text-muted">Category</small>
                        <a href="#" class="product-name"> Product</a>
                        <div class="small m-t-xs">
                            Many desktop publishing packages and web page editors now.
                        </div>
                        <div class="m-t text-righ">
                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(function() {
            $('.contact-us').addClass('active');
            $('.contact-us').addClass('btn-rounded');
            $(".contact-us").css("background","#0997a7");
            $(".contact-us a").css("color","#fff");
        });
    </script>
@endpush
