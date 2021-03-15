@extends('layouts.app')

@section('title')
    Your Orders | Bright Containers
@endsection

@push('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">  
  
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
  {{-- <link href="https://cdn/.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<h1>Orders page</h1>

<div class="ibox-content">
  <div class="table-responsive">
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
              Seller
            @endif
          </th>
          <th>Order Date</th>
          <th>Order Status</th>
          <th>Payment Status</th>
          <th>Order Details</th>
          <th>Challan Details</th>
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
                @if ($order[$i]->consignee_available == '1')
                  {{$order[$i]->consignee->name}}
                  {{-- Consignee --}}
                @else
                  {{-- Seller --}}
                  {{$order[$i]->seller->name}}
                @endif
              @endif
            </td>
            <td style="vertical-align:middle;">{{$order[$i]->order_date}}</td>
            <td class="justify-content-center align-middle">
              @switch($order[$i]->order_status)
                  @case('pending')
                    <center><span class="label label-warning" style="display:block;width:55%;padding:6px;">Pending</span></center>
                    @break
                  @case('shipped')
                    <center><span class="label label-success" style="display:block;width:55%;padding:6px;">Shipped</span></center>
                    @break
                  @case('canceled')
                    <center><span class="label label-danger" style="display:block;width:55%;padding:6px;">Canceled</span></center>
                    @break
                  @case('completed')
                    <center><span class="label label-primary" style="display:block;width:55%;padding:6px;">Completed</span></center>
                    @break
                  @default
                    <center><span class="label label-block" style="display:block;width:55%;padding:6px;">Unknown</span></center>
                    @break
              @endswitch
            </td>

            <td class="justify-content-center align-middle">
              @switch($order[$i]->payment_status)
                  @case('pending')
                    <center><span class="label label-warning" style="display:block;width:55%;padding:6px;">Pending</span></center>
                    @break
                  @case('canceled')
                    <center><span class="label label-danger" style="display:block;width:55%;padding:6px;">Canceled</span></center>
                    @break
                  @case('completed')
                    <center><span class="label label-primary" style="display:block;width:55%;padding:6px;">Completed</span></center>
                    @break
                  @default
                    <center><span class="label label-block" style="display:block;width:55%;padding:6px;">Unknown</span></center>
                    @break
              @endswitch
            </td>
            <td style="vertical-align:middle;">
              <form action="{{URL('orderDetails',[$order[$i]->id])}}" method="post">
                @csrf
                <center>
                  <button type="submit" class="btn btn-primary" style="display:block;width:50%;padding:1px;">
                    Show
                  </button>
                </center>
              </form>
            </td>
            <td style="vertical-align:middle;">
              <form action="{{URL('orderDetails',[$order[$i]->id])}}" method="post">
                @csrf
                <center>
                  <button type="submit" class="btn btn-primary" style="display:block;width:50%;padding:1px;">
                    Show
                  </button>
                </center>
              </form>
            </td>
          </tr>
        @endfor
      </tbody>
    </table>


    {{-- <table class="table text-center table-bordered table-hover" id="yajra-datatable" >
      <thead>
        <tr>
          <th>Sr. No</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Order Status</th>
          <th>Payment Status</th>
          <th></th>
        </tr>
      </thead>  
      <tbody>
      </tbody>
    </table> --}}
    
  </div>
</div>
@endsection

@push('script')
  {{-- <script src="{{asset('js/plugins /dataTables/datatables.min.js')}}"></script> --}}
  {{-- <script src="{{asset('js/plugins/da  taTables/dataTables.bootstrap4.min.js')}}"></script> --}}
  <script>
    $(document).ready(function(){
      var t = $('#ordersTable').DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        pageLength: 5,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},
            {extend: 'print',
              customize: function (win){
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');
                $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
              }
            }
        ]
      });
      t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
        } );
      } ).draw();
    });
  </script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

{{-- <script type="text/javascript">
  $(function () {
    var table = $('#yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('orders.list') }}",
        columns: [    
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'product_id', name: 'name'},
            {data: 'quantity', name: 'email'},
            {data: 'order_status', name: 'username'},
            {data: 'payment_status', name: 'phone'},
            {data: 'action', name: 'action', orderable: true, searchable: true}
        ]
    });
    
  });
</script> --}}

@endpush 