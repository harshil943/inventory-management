@extends('layouts.app')

@section('content')


<div class="ibox-content">

    <div class="row">
        <div class="col-md-5">


            <div id="productCarosuel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('img/a1.jpg')}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/a2.jpg')}}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/a3.jpg')}}" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

        </div>
        <div class="col-md-7">

            <h2 class="font-bold m-b-xs">
                 
                {{$product->product_name}}
            </h2>
            <small>Many desktop publishing packages and web page editors now.</small>
            <div class="m-t-md">
                <h2 class="product-main-price">$406,602 <small class="text-muted">Exclude Tax</small> </h2>
            </div>
            <hr>

            <h4>Product description</h4>

            <div class="small text-muted">
                It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is

                <br/>
                <br/>
                There are many variations of passages of Lorem Ipsum available, but the majority
                have suffered alteration in some form, by injected humour, or randomised words
                which don't look even slightly believable.
            </div>
            <dl class="small m-t-md">
                <dt>Description lists</dt>
                <dd>A description list is perfect for defining terms.</dd>
                <dt>Euismod</dt>
                <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                <dt>Malesuada porta</dt>
                <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
            </dl>
            <hr>

            <div>
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
                    <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                    <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>
                </div>
            </div>



        </div>
    </div>

</div>
    
@endsection


