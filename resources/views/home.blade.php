@extends('layouts.app')

@section('title')
    Home | Bright Containers
@endsection

@section('content')
    
    <section class="section-main bg-light padding-y mt-5">
        <div class="container">
        
        <div class="row">
            <aside class="col-md-3 my-auto">
                <nav class="card">
                    <div class="card-headder mx-auto f">Most Popular</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#">Best clothes</a></li>
                        <li class="list-group-item"><a href="#">Automobiles</a></li>
                        <li class="list-group-item"><a href="#">Home interior</a></li>
                        <li class="list-group-item"><a href="#">Electronics</a></li>
                        <li class="list-group-item"><a href="#">Technologies</a></li>
                        <li class="list-group-item"><a href="#">Digital goods</a></li>
                        
                    </ul>
                </nav>
            </aside> <!-- col.// -->
            <div class="col-md-9 my-auto">
                <article class="banner-wrap">
                    <img src="{{asset('img/hero.jpg')}}" class="w-100 rounded" style="height: 350px">
                </article>
            </div> <!-- col.// -->
        </div> <!-- row.// -->
        </div> <!-- container //  -->
        </section>
@endsection