@extends('layouts.app')

@section('title')
    About Us | Bright Containers
@endsection

@section('content')
<div class="wrapper mt-3 wrapper-content animated fadeInRight">
    <div class="row" style="font-size: 23px">
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <figure>
                        <iframe src="https://www.youtube.com/embed/1VKERrDp63o?autoplay=1&amp;rel=0" frameborder="0" width=100% height=450px allowfullscreen></iframe>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
                <p style="text-indent: 40px;">
                <big><strong>Bright Containers </strong></big> was established in 2008 for the manufacturing of Blow &amp; Injection molding articles, the company continues to grow year over year.
                </p>
                <p style="text-indent: 40px;margin-top: 25px;">
                    The company has developed in depth knowledge with latest manufacturing methods to manufacture HDPE Bottles, Jerry can &amp; Containers.
                </p><ul style="margin-top: 25px;">
                        <li>
                            Different Shapes &amp; Sizes available from 25ml to 5ltr.
                        </li>
                        <li>
                            Design and Manufacture custom made and industry standard Bottles, Caps, Closures and Measuring cups of Agro Chemical Products.
                        </li>
                        <li>
                            Design and Manufacture custom shape Jerry can for Lubricating Oil Industries.
                        </li>
                        <li>
                            Manufacturing facility for Injection Molding Articles for various material grade &amp; sizes.
                        </li>
                        <li>
                            Our Products are useful to pack Liquid, Semi Liquid, Powder, Capsule &amp; Tablets.
                        </li>
                    </ul>
                <p></p>
        </div>
    </div>
    <section id="about">
        <h4 style="color: #000000;">
            <strong>&nbsp;&nbsp;Different Indusries Where Our Products Used</strong>
        </h4>
        <br>
        <div class="card-deck" style="margin-left:10px;margin-right: 10px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget style1 blue-bg" >
                        <h4 class="font-bold">Pesticides</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Agro Chemicals</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Lubricating Oil</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Ayurvedic Product Packing</h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Paint Chemical Industries</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Bio-nutrients</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Fungicides</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Coolant Water Packing</h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Aloevera Product Packing</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Water Proofing Chemicals</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Plant Growth Promoter</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget style1 blue-bg">
                        <h4 class="font-bold">Bio-Pesticides</h4>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div>
            <h1 style="color: #0997a7;font-weight:bold">Our Mission</h1>
            <ul>
                <li>ACCOMPLISH CUSTOMER’S QUALITY REQUIREMENT WITH IN-TIME SERVICES</li>
                <li>AMPLE CARE TAKEN AT EACH STAGE OF PRODUCTION</li>
                <li>SYSTEMATIC OPERATING PROCEDURE FOLLOWS AT EACH STAGE OF PRODUCTION</li>
            </ul>
        </div>
    </section>
</div>
@endsection

@push('script')
    <script>
        $(function() {
            $('.about-us').addClass('active');
            $('.about-us').addClass('btn-rounded');
            $('.about-us').addClass('blue-bg');
            $(".about-us a").css("color","#fff");
        });
    </script>
@endpush
