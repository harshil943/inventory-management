@extends('layouts.app')

@section('title')
    Order Details | Bright Containers
@endsection

@section('content')    
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
                    <h4>Invoice No. -  {{$order}}</h4>
                    
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
                        <td><div><strong>Product 1</strong></div></td>
                        <td>{{$quantity}}</td>
                        <td><i class="fa fa-inr"></i> {{$unitPrice}}</td>
                        <td><i class="fa fa-inr"></i> {{ ($unitPrice * 18)/100}}</td>
                        <td><i class="fa fa-inr"></i> {{(($unitPrice * 18)/100) + $unitPrice }}</td>
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
                    <td><i class="fa fa-inr"></i> {{$subTotal}}</td>
                </tr>
                <tr>
                    <td><strong>TAX :</strong></td>
                    <td><i class="fa fa-inr"></i> {{$tax}}</td>
                </tr>
                <tr>
                    <td><strong>TOTAL :</strong></td>
                    <td><i class="fa fa-inr"></i> {{$subTotal + $tax}}</td>
                </tr>
                </tbody>
            </table>
            <br><br>
            <div class="text-right">
                @php
                    $status = 'pending';
                    // $status = 'pendig';
                    if($status == 'pending')
                    {
                        echo '<button class="btn btn-primary"> Make Payment</button>';
                    }
                @endphp
                
                
                <a href="{{URL::to('/create-pdf/'.$order)}}" class="btn btn-warning"> Download Invoice</a>
                <button class="btn btn-danger"> Print Invoice</button>
            </div>
        </div>
</div>

@endsection