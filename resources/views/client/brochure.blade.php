@extends('layouts.app')

@section('title')
    Brochures | Bright Containers
@endsection

@section('content')
{{-- Temp --}}
{{$id = 1}}
{{-- EndTemp --}}

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-3">
            <div class="contact-box center-version">
                <a href="">
                    <img alt="image" class="img-circle" src="img/a2.jpg">
                    <h3 class="m-b-xs"><strong>John Smith</strong></h3>
                    <div class="font-bold">Graphics designer</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </a> 
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white" href="{{url('brochureDetails',[$id=>'1'])}}"><i class="fa fa-arrow-right"></i> Preview </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection