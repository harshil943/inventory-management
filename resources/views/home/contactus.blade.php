
@extends('layouts.app')

@section('title')
    Contect Us | Bright Containers
@endsection

@push('css')
    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
      {{-- Sweet Alert --}}
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@section('content')
@include('sweet::alert')
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-4">
            <div class="card text-center border border-rounded rounded-50" style="width: 18rem;">
                <span class="card-img-top p-3 fa fa-building fa-5x" style=""></span>
                <div class="card-title">
                    <h3>Head Office</h3>
                </div>
                <hr class="w-50" size="10" style="margin: auto;height:3px;background-color:black;">
                <div class="card-body">
                <p class="card-text">1st Floor Basudiwala Building,<br>
                    Station Road, Nadiad<br>
                    Gujarat 387001</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-center border border-rounded rounded-50" style="width: 18rem;">
                <span class="card-img-top p-3 fa fa-map-o fa-5x" style=""></span>
                <div class="card-title">
                    <h3>Factory Site</h3>
                </div>
                <hr class="w-50" size="10" style="margin: auto;height:3px;background-color:black;">
                <div class="card-body">
                <p class="card-text"> Plot No 660/3-4,<br>
                    Near Railway Crossing, Tundel <br>
                    Nadiad, Gujarat 387230</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-center border border-rounded rounded-50" style="width: 18rem;">
                <span class="card-img-top p-3 fa fa-address-book-o fa-5x" style=""></span>
                <div class="card-title">
                    <h3>Factory Site</h3>
                </div>
                <hr class="w-50" size="10" style="margin: auto;height:3px;background-color:black;">
                <div class="card-body">
                    <i class="fa fa-envelope-o"></i>
                    <a href="mailto:info@brightcontainers.com">info@brightcontainers.com</a>
                    <br>
                    <i class="fa fa-phone"></i>
                    <a href="tel:+912682563990">+91268 2563990</a>
                    <br>
                    <i class="fa fa-mobile"></i>
                    <a href="tel:+919826563069">+91 9825363069</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 40px;">
        <div class="col-sm-6 form_part" style="border-right: #ebebeb solid 2px;">
            <div class="section-header">
                <h2>
                    <i class="fa fa-comments-o" style="color: #000;"></i>
                    Send Your Queries
                </h2>
                <p></p>
            </div>
            <div class="form">
                <form method="post" action="{{route('contact')}}">
                    @csrf
                    <div class="control-group">
                        <div class="form-group">
                            <h6>
                                <i class="fa fa-address-card-o"></i>
                                Your Name :
                            </h6>
                            <input type="text" id="name" class="form-control" name="Name" placeholder="Enter Your Name Here" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <h6>
                                <i class="fa fa-envelope-o"></i>
                                Email :
                            </h6>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your E-mail Here" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <h6>
                                <i class="fa fa-phone"></i>
                                Phone Number :
                            </h6>
                            <input type="text" id="contact_numer" class="form-control" name="number" placeholder="Enter Your Phone Number Here" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <h6>
                                <i class="fa fa-building-o"></i>
                                Company Name :
                            </h6>
                            <input type="text" id="company" class="form-control" name="company" placeholder="Enter Your Comapany Name Here">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <h6>
                                <i class="fa fa-address-book-o"></i>
                                Product Category :
                            </h6>
                            <select id="category" class="form-control" name="category">
                                <option></option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <h6>
                                <i class="fa fa-address-book-o"></i>
                                Product Name :
                            </h6>
                            <select id="product" class="form-control" name="product">
                                <option></option>
                                @foreach ($products as $item)
                                    <option value="{{$item->id}}">{{$item->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <h6>
                                <i class="fa fa-comment-o"></i>
                                Query :
                            </h6>
                            <textarea rows="10" cols="100" class="form-control" name="query" required data-validation-required-message="Please enter your query" minlength="5" data-validation-minlength-message="Min 5 characters" maxlength="999" style="resize:none"  placeholder="Enter Your Query Here"></textarea>
                        </div>
                    </div>
                    <center><button type="submit" class="btn btn-success">Send</button></center>
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="section-header">
                <h2>
                    <i class="fa fa-building-o" style="color: #000;"></i>
                    Head Office
                </h2>
                <p></p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3642.592366423571!2d72.85764731493413!3d22.69344698512071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e5b0f0574bb67%3A0x9b9530e36bf601a5!2sBright%20Containers!5e1!3m2!1sen!2sin!4v1587083560953!5m2!1sen!2sin" width="100%" height="450px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="section-header my-3">
                <h2>
                    <i class="fa fa-map-o" style="color: #000;"></i>
                    Factory Site
                </h2>
                <p></p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d325.21256622783795!2d72.81863473588169!3d22.67885969479785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e5bcdb6aaaaab%3A0x3d84c44bc292ebe0!2sBRIGHT%20CONTAINERS!5e1!3m2!1sen!2sin!4v1587083337945!5m2!1sen!2sin" width="100%" height="450px" frameborder="0" style="border:0;" allowfullscreen="1" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
   {{-- Select 2 JS --}}
   <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>

   <script>
       $(document).ready(function(){
             $("#category").select2({
                 placeholder: "Select Category",
                 allowClear: true
             });
             $("#product").select2({
                 placeholder: "Select Product",
                 allowClear: true
             });
        });
   </script>
    <script>
        $(function() {
            $('.contact-us').addClass('active');
            $('.contact-us').addClass('btn-rounded');
            $(".contact-us").css("background","#0997a7");
            $(".contact-us a").css("color","#fff");
        });
    </script>
@endpush
