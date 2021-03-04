@extends('layouts.app')

@section('title')
    Brochures | Bright Containers
@endsection

@section('css')
    <style>
        .contact-box {
            margin:10px;
        }
    </style>    
@endsection

@section('content')
{{-- Temp --}}
@php
    $id = 1
@endphp
{{-- EndTemp --}}

    <div class="container wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="contact-box center-version col-sm-3">
                <a href="{{url('brochureDetails',[$id=>'1'])}}" style="text-decoration: none">
                    <img alt="image" class="img" src="img/a2.jpg">
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <h3>Brochure Name</h3>
                        </div>
                    </div>
                </a> 
            </div>

            <div class="contact-box center-version col-sm-3">
                <a href="{{url('brochureDetails',[$id=>'2'])}}" style="text-decoration: none">
                    <img alt="image" class="img" src="img/a2.jpg">
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <h3>Brochure Name</h3>
                        </div>
                    </div>
                </a> 
            </div>

            <div class="contact-box center-version col-sm-3">
                <a href="{{url('brochureDetails',[$id=>'3'])}}" style="text-decoration: none">
                    <img alt="image" class="img" src="img/a2.jpg">
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <h3>Brochure Name</h3>
                        </div>
                    </div>
                </a> 
            </div>

            <div class="contact-box center-version col-sm-3">
                <a href="{{url('brochureDetails',[$id=>'4'])}}" style="text-decoration: none">
                    <img alt="image" class="img" src="img/a2.jpg">
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <h3>Brochure Name</h3>
                        </div>
                    </div>
                </a> 
            </div>

            <div class="contact-box center-version col-sm-3">
                <a href="{{url('brochureDetails',[$id=>'5'])}}" style="text-decoration: none">
                    <img alt="image" class="img" src="img/a2.jpg">
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <h3>Brochure Name</h3>
                        </div>
                    </div>
                </a> 
            </div>

        </div>
    </div>
@endsection 