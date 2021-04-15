@extends('layouts.app')

@section('title')
    Challan - {{$challan->id}} | Bright Containers
@endsection

@section('breadcrumb')
  @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
    @section('breadcrumb-title')
      &nbsp; Challan Details
    @endsection
    @section('breadcrumb-item')
      <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('orders.index') }}">Orders</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Challan Details</strong>
      </li>
    @endsection
  @endif
@endsection

@section('content')
<div class="page-wrapper wrapper-content animated fadeInRight">
    <div class="ibox-content p-xl">
        <div class="row">
            <div class="col-sm-6 border-right">
                <h6>Seller: </h6>
                <strong style="font-size: 24px;">{{$challan->seller->name}}</strong>
                <br>
                <strong>{{$challan->seller->head_office_address}}</strong>
                <div class="row">
                    <div class="col-sm-4">
                        State Code
                        <br>
                        GST Number
                        <br>
                        PAN Number
                    </div>
                    <div class="col-sm-8">
                        : <strong>{{$challan->seller->state_code}}</strong>
                        <br>
                        : <strong>{{$challan->seller->gst_number}}</strong>
                        <br>
                        : <strong>{{$challan->seller->pan_number}}</strong>
                    </div>
                </div>
                <hr>
                <h6>Buyer: </h6>
                <strong style="font-size: 24px;">{{$challan->buyer->name}}</strong>
                <br>
                <strong>{{$challan->buyer->address}}</strong>
                <div class="row">
                    <div class="col-sm-4">
                        State Code
                        <br>
                        GST Number
                    </div>
                    <div class="col-sm-8">
                        : <strong>{{$challan->buyer->state_code}}</strong>
                        <br>
                        : <strong>{{$challan->buyer->gst_number}}</strong>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h4 class="text-right">Challan No. - {{$challan->challan_id}}</h4>
                <div class="row text-left">
                    <div class="col-sm-6 border-right">
                        Buyer`s Order No.
                        <br>
                        <strong>{{$challan->order->buyer_order_number}}</strong>
                        <br><br>
                        Order Date
                        <br>
                            <strong>{{$challan->order_date}}</strong>
                        <br><br>
                        Despatch Through
                        <br>
                        @if ($challan->dispatch_method)
                        <strong>{{$challan->dispatch_method}}</strong>
                        @else
                        <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Total Packages
                        <br>
                        <strong>{{$challan->challan->total_no_packages}}</strong>
                    </div>
                    <div class="col-sm-6">
                        Invoice No.
                        <br>
                        @if ($challan->challan)
                        <strong>{{$challan->challan->id}}</strong>
                        @else
                        <strong>Not Generated Yet</strong>
                        @endif
                        <br><br>
                        Shipping Date
                        <br>
                        @if ($challan->shipping_date)
                            <strong>{{$challan->shipping_date}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                        <br><br>
                        Motor Vehicle No
                        <br>
                        @if ($challan->vehical_number)
                            <strong>{{$challan->vehical_number}}</strong>
                        @else
                            <strong>Not Assigned Yet</strong>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="table-responsive m-t">
            <table class="table table-bordered table-hover invoice-table">
                <thead>
                    <tr>
                        <th class="text-center align-middle">Item List</th>
                        <th class="text-center align-middle">Color</th>
                        <th class="text-center align-middle">Bundle Size</th>
                        <th class="text-center align-middle">Pack Size</th>
                        <th class="text-center align-middle">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < sizeof($challan->challan->product_id); $i++)
                        <tr>
                            <td class="text-left align-middle" rowspan="{{sizeof($challan->challan->color[$i]) + 1}}">
                                <strong>{{$challan->challan->product_id[$i]}}</strong>
                            </td>
                            @php
                                $total = 0;
                            @endphp
                            @if ($challan->challan->is_cap[$i])
                                @for($j = 0; $j < sizeof($challan->challan->color[$i]); $j++)
                                    @if ($j != 0)
                                        <tr>
                                    @endif
                                    <td class="text-right">
                                        <strong>{{$challan->challan->color[$i][$j]}}</strong>
                                    </td>
                                    <td>
                                        Avg - {{$challan->challan->bundle[$i][$j]}} GMS
                                    </td>
                                    <td>
                                        {{$challan->challan->pack_size[$i][$j]}} UNT
                                    </td>
                                    <td>
                                        {{number_format((float)(((int)$challan->challan->bundle[$i][$j] * (int)$challan->challan->pack_size[$i][$j])/1000), 2, '.', '')}} KGS
                                    </td>
                                    @if ($j != 0)
                                        </tr>
                                    @endif
                                    @php
                                        $total += ((int)$challan->challan->bundle[$i][$j] * (int)$challan->challan->pack_size[$i][$j])/1000;
                                    @endphp
                                @endfor
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <strong>Total Weight:</strong>
                                    </td>
                                    <td >
                                        <strong> {{number_format((float)($total), 2, '.', '')}} KGS</strong>
                                    </td>
                                </tr>
                            @else
                                @for($j = 0; $j < sizeof($challan->challan->color[$i]); $j++)
                                    @if ($j != 0)
                                        <tr>
                                    @endif
                                    <td class="text-right">
                                        <strong>{{$challan->challan->color[$i][$j]}}</strong>
                                    </td>
                                    <td>
                                        {{$challan->challan->bundle[$i][$j]}} BDL
                                    </td>
                                    <td>
                                        {{$challan->challan->pack_size[$i][$j]}} UNT
                                    </td>
                                    <td>
                                        {{(int)$challan->challan->bundle[$i][$j] * (int)$challan->challan->pack_size[$i][$j]}} UNT
                                    </td>
                                    @if ($j != 0)
                                        </tr>
                                    @endif
                                    @php
                                        $total += (int)$challan->challan->bundle[$i][$j] * (int)$challan->challan->pack_size[$i][$j];
                                    @endphp
                                @endfor
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <strong>Total :</strong>
                                    </td>
                                    <td >
                                        <strong>{{$total}} UNT</strong>
                                    </td>
                                </tr>
                            @endif
                        </tr>
                    @endfor
                    <tr>
                        <td colspan="5" style="border:none;">
                            <strong>E. & O.E</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if ($challan->challan->extra_note)
            <table class="table invoice-total">
                <tbody>
                    <tr>
                        <td>
                            <strong>Extra Note :</strong>
                        </td>
                        <td style="width:60%;">
                            {{$challan->challan->extra_note}}
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
        <hr>

        <div class="row">
            <div class="col-sm-6 border-right">
                <br><br><br><br>
                <strong>
                    Stamp & Signature, <br>
                    of {{$challan->buyer->name}}
                </strong>
            </div>
            <div class="col-sm-6 text-right">
                <br><br><br><br>
                <strong>
                    Stamp & Signature, <br>
                    of {{$challan->seller->name}}
                </strong>
            </div>
        </div>

        <br><br>
        <center>
            <form action="{{URL('printchallan',[$challan->challan_id])}}" method="post">
                @csrf
                <button type="submit" class="btn btn-warning">
                    Download/Print Invoice
                </button>
            </form>
        </center>
    </div>
</div>
@endsection
@push('script')
    @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
        <script>
            $(function() {
                $('.orders').addClass('active');
                $('.orders ul').addClass('in');
                $('.orders ul li:nth-child(2)').addClass('active');
            });
        </script>
    @endif
@endpush
