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
    <div class="container wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @foreach ($brochure as $item)
                
            <div class="contact-box center-version col-sm-3">
                <a href="{{url('brochureDetails',[$item->id])}}" style="text-decoration: none">
                    <img alt="image" class="img" src="{{asset('img/a2.jpg')}}">
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <h3>{{$item->category_name}}</h3>
                        </div>
                    </div>
                </a> 
            </div>
            @endforeach

        </div>
    </div>
@endsection 