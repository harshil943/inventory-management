@extends('layouts.app')

@section('title')
    Order Details | Bright Containers
@endsection

@section('content')    
<h1>{{$order}}</h1>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox-content p-xl">
            <div class="row">
                <div class="col-sm-6">
                    <h5>From:</h5>
                    <address>
                        <strong>Inspinia, Inc.</strong><br>
                        106 Jorg Avenu, 600/10<br>
                        Chicago, VT 32456<br>
                        <abbr title="Phone">P:</abbr> (123) 601-4590
                    </address>
                </div>

                <div class="col-sm-6 text-right">
                    <h4>Invoice No.</h4>
                    <h4 class="text-navy">INV-000567F7-00</h4>
                    <span>To:</span>
                    <address>
                        <strong>Corporate, Inc.</strong><br>
                        112 Street Avenu, 1080<br>
                        Miami, CT 445611<br>
                        <abbr title="Phone">P:</abbr> (120) 9000-4321
                    </address>
                    <p>
                        <span><strong>Invoice Date:</strong> Marh 18, 2014</span><br/>
                        <span><strong>Due Date:</strong> March 24, 2014</span>
                    </p>
                </div>
            </div>

            <div class="table-responsive m-t">
                <table class="table invoice-table">
                    <thead>
                    <tr>
                        <th>Item List</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Tax</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        
                        $subTotal = 0;
                        $tax = 0;
                        $unitPrice = 2600;
                        $quantity = 2;
                    @endphp
                    
                    @for ($i = 0; $i < 3; $i++)
                        
                    <tr>
                        <td><div><strong>Admin Theme with psd project layouts</strong></div>
                            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td>
                            <td>{{$quantity}}</td>
                            <td>${{$unitPrice}}</td>
                            <td>18%</td>
                            <td>{{ (($unitPrice * 18)/100) + $unitPrice }}</td>
                        </tr>
                        @php
                            
                            $subTotal = $subTotal + ($unitPrice*$quantity);
                            $tax = $tax + ((($unitPrice*18)/100) * $quantity);
                        @endphp
                        
                    @endfor
                    </tbody>
                </table>
            </div><!-- /table-responsive -->

            <table class="table invoice-total">
                <tbody>
                <tr>
                    <td><strong>Sub Total :</strong></td>
                    <td>{{$subTotal}}</td>
                </tr>
                <tr>
                    <td><strong>TAX :</strong></td>
                    <td>{{$tax}}</td>
                </tr>
                <tr>
                    <td><strong>TOTAL :</strong></td>
                    <td>{{$subTotal + $tax}}</td>
                </tr>
                </tbody>
            </table>
            <div class="text-right">
                <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
            </div>

            <div class="well m-t"><strong>Comments</strong>
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
            </div>
        </div>
</div>

@endsection