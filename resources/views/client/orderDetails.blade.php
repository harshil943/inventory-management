@extends('layouts.app')

@section('content')    
<h1>{{$order}}</h1>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">
                    <h1><span class="text-navy">ORDER SUMMURY</span></h1>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content  p-md">

                    <h3 class="m-b-xxs">Host Details</h3>
                    <div class="row">
                        <div class="col-sm-1"><label for="hostName" class="form-lable h5 mt-4">Name:</label></div>
                        <div class="col-sm-11"><label for="hostName" class="form-lable h5 text-navy mt-4">John Cena</label></div>
                        <div class="col-sm-1"><label for="hostName" class="form-lable h5 mt-2">Address:</label></div>
                        <div class="col-sm-11"><label for="hostName" class="form-lable h5 text-navy ml-2 mt-2">bsquare-2,<br>antariksh BRT,<br>ambli road,<br> bopal-300 007</label></div>
                        <div class="col-sm-1"><label for="hostName" class="form-lable h5 mt-2">GST:</label></div>
                        <div class="col-sm-11"><label for="hostName" class="form-lable h5 text-navy mt-2">18%</label></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content  p-md">

                    <h3 class="m-b-xxs">Client Details </h3>
                    <div class="row">
                        <div class="col-sm-1"><label for="hostName" class="form-lable h5 mt-4">Name:</label></div>
                        <div class="col-sm-11"><label for="hostName" class="form-lable h5 text-navy mt-4">Undertaker</label></div>
                        <div class="col-sm-1"><label for="hostName" class="form-lable h5 mt-2">Address:</label></div>
                        <div class="col-sm-11"><label for="hostName" class="form-lable h5 text-navy ml-2 mt-2">bsquare-2,<br>antariksh BRT,<br>ambli road,<br> bopal-300 007</label></div>
                        <div class="col-sm-1"><label for="hostName" class="form-lable h5 mt-2">GST:</label></div>
                        <div class="col-sm-11"><label for="hostName" class="form-lable h5 text-navy mt-2">20%%</label></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Index</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price Per Pisces</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>2</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>1</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td class="p-5" colspan="3">Total</td>
                    <td class="p-5">150</td>
                </tr>
                </tbody>
            </table>
    </div>
</div>

@endsection