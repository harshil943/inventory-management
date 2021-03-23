@extends('layouts.app')

@section('title')
  @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
    Order Details | Bright Containers
  @else
    Your Orders | Bright Containers
  @endif
@endsection

@push('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('breadcrumb')
  @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
    @section('breadcrumb-title')
      &nbsp; Orders
    @endsection
    @section('breadcrumb-item')
      <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Order Details</strong>
      </li>
    @endsection
  @else
    <h1>Orders page</h1>
  @endif
@endsection

@section('content')
  <div class="table-responsive">
        <br>
        <form action="{{URL('orderForm')}}" method="get" style="padding-left:20px;">
            <button type="submit" class="btn btn-primary" style="display:block;width:15%;">
                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                Add New Order
            </button>
        </form>
    <br>
    <table class="table text-center table-bordered table-hover" id="ordersTable" >
      <thead>
        <tr>
          <th>Sr. No</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>
            @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
              Buyer Name
            @else
              Seller Or Consignee
            @endif
          </th>
          <th>Order Status</th>
          <th>Payment Status</th>
          <th>Invoice Slip</th>
          <th>Package Slip</th>
        </tr>
      </thead>
      <tbody>
        @for($i = 0; $i < sizeof($order); $i++)
          <tr class="gradeX">
            <td style="vertical-align:middle;"></td>

            <td class="text-left ml-5 p-3">
              @php
                $count = 0;
              @endphp
              @foreach ($order[$i]->order->product_id as $name)
                {{$name}}
                @if(count($order[$i]->order->product_id) != ++$count)
                  <hr>
                @endif
              @endforeach
            </td>

            <td class="ml-5 p-3">
              @php
                $count = 0;
              @endphp
              @foreach ($order[$i]->order->quantity as $quantity)
                {{$quantity}}
                @if(count($order[$i]->order->quantity) != ++$count)
                  <hr>
                @endif
              @endforeach
            </td>
            <td style="vertical-align:middle;">
              @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                {{$order[$i]->buyer->name}}
              @else
                @if ($order[$i]->consignee)
                  {{$order[$i]->consignee->name}}
                @else
                  {{$order[$i]->seller->name}}
                @endif
              @endif
            </td>
            <td class="align-middle">
              @switch($order[$i]->order_status)
                  @case('pending')
                    <center><span class="label label-warning" style="display:block;width:75%;padding:6px;">Pending</span></center>
                    @break
                  @case('shipped')
                    <center><span class="label label-success" style="display:block;width:75%;padding:6px;">Shipped</span></center>
                    @break
                  @case('canceled')
                    <center><span class="label label-danger" style="display:block;width:75%;padding:6px;">Canceled</span></center>
                    @break
                  @case('completed')
                    <center><span class="label label-primary" style="display:block;width:75%;padding:6px;">Completed</span></center>
                    @break
                  @default
                    <center><span class="label label-block" style="display:block;width:75%;padding:6px;">Unknown</span></center>
                    @break
              @endswitch
            </td>

            <td class="align-middle">
              @switch($order[$i]->payment_status)
                  @case('pending')
                    <center><span class="label label-warning" style="display:block;width:75%;padding:6px;">Pending</span></center>
                    @break
                  @case('canceled')
                    <center><span class="label label-danger" style="display:block;width:75%;padding:6px;">Canceled</span></center>
                    @break
                  @case('completed')
                    <center><span class="label label-primary" style="display:block;width:75%;padding:6px;">Completed</span></center>
                    @break
                  @default
                    <center><span class="label label-block" style="display:block;width:75%;padding:6px;">Unknown</span></center>
                    @break
              @endswitch
            </td>


            <td style="vertical-align:middle;">
                <center>
                    <form action="{{URL('orderDetails',[$order[$i]->order_id])}}" method="post">
                        @csrf
                        <button type="submit" class="btn-rounded btn-primary" style="display:block;width:70%;padding:5px;">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Show
                        </button>
                    </form>
                    @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                        <br>
                        <form action="{{URL('orderDetails',[$order[$i]->order_id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn-rounded btn-secondary" style="display:block;width:70%;padding:5px;">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </button>
                        </form>
                        <br>
                        <form action="{{URL('orderDetails',[$order[$i]->order_id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn-rounded btn-danger" style="display:block;width:70%;padding:5px;">
                                <i class="fa fa-trash
                                " aria-hidden="true"></i>
                                Delete
                            </button>
                        </form>
                    @endif
                </center>
            </td>


            <td style="vertical-align:middle;">
                <center>
                    @if ($order[$i]->challan_id)
                        <form action="{{URL('challanDetails',[$order[$i]->challan_id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn-rounded btn-primary" style="display:block;width:70%;padding:5px;">
                                <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;
                                Show
                            </button>
                        </form>
                        @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                            <br>
                            <form action="{{URL('orderDetails',[$order[$i]->order->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn-rounded btn-secondary" style="display:block;width:70%;padding:5px;">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Edit
                                </button>
                            </form>
                            <br>
                            <form action="{{URL('orderDetails',[$order[$i]->order->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn-rounded btn-danger" style="display:block;width:70%;padding:5px;">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    Delete
                                </button>
                            </form>
                        @endif
                    @else
                        @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                            <form action="{{URL('challanForm',[$order[$i]->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn-rounded btn-primary" style="display:block;width:70%;padding:5px;">
                                    <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                                    Create
                                </button>
                            </form>
                        @else
                            <strong>Not Yet Generated</strong>
                        @endif
                    @endif
                </center>
            </td>
          </tr>
        @endfor
      </tbody>
    </table>
  </div>
@endsection

@push('script')
  <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
  <script src="{{asset('js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function(){
        var t = $('#ordersTable').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            pageLength: 5,
            responsive: true
            // dom: '<"html5buttons"B>lTfgitp'
            // buttons: [
                // {extend: 'excel', title: 'ExampleFile'},
                // {extend: 'pdf', title: 'ExampleFile'},
                // {extend: 'print',
                //     customize: function (win){
                //         $(win.document.body).addClass('white-bg');
                //         $(win.document.body).css('font-size', '10px');
                //         $(win.document.body).find('table')
                //         .addClass('compact')
                //         .css('font-size', 'inherit');
                //     }
                // }
            // ]
        });
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    });
  </script>
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
