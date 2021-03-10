@extends('layouts.app')

@section('title')
    Your Orders | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">  
@endpush

@section('content')
<h1>Orders page</h1>

<div class="ibox-content">
  <div class="table-responsive">
    <table class="table text-center table-bordered table-hover" id="ordersTable" >
      <thead>
        <tr>
          <th></th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Order Status</th>
          <th>Payment Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        
        @foreach ($order as $item)
          <tr class="gradeX">
            <td style="vertical-align:middle;"></td>
            <td class="text-left ml-5 p-3">
              @php
                $count = 0;    
              @endphp
              @foreach ($item->product_id as $name)
                {{$name}} 
                @if(count($item->product_id) != ++$count)
                  <hr>
                @endif
              @endforeach
            </td>
            <td class="ml-5 p-3">
              @php
                $count = 0;    
              @endphp
              @foreach ($item->quantity as $quantity)
                {{$quantity}} 
                @if(count($item->quantity) != ++$count)
                  <hr>
                @endif
              @endforeach
            </td>
            <td style="vertical-align:middle;">
              @php
                // $status = 'pending';
                // $status = 'shipped';
                // $status = 'canceled';
                // $status = 'completed';
                // $status = 'complet';
                switch($item->order_status){
                  case 'pending':
                    echo '<center><span class="label label-warning" style="display:block;width:35%;padding:6px;">Pending</span></center>';
                    break;
                  
                  case 'shipped':
                    echo '<center><span class="label label-success" style="display:block;width:35%;padding:6px;">Shipped</span></center>';
                    // echo '<span class="label label-success">Shipped</span>';
                    break;
                  
                  case 'canceled':
                    echo '<center><span class="label label-danger" style="display:block;width:35%;padding:6px;">Canceled</span></center>';
                    // echo '<span class="label label-danger">Canceled</span>';
                    break;
                
                  case 'completed':
                  echo '<center><span class="label label-primary" style="display:block;width:35%;padding:6px;">Completed</span></center>';
                    // echo '<span class="label label-primary">Completed</span>';
                    break;
              
                  default :
                    echo '<center><span class="label label-block" style="display:block;width:35%;padding:6px;">Unknown</span></center>';
                    // echo '<span class="label label-block">Unknown</span>';
                    break;
                }
              @endphp
            </td>
            <td style="vertical-align:middle;">
              @php
                // $status = 'pending';
                // $status = 'completed';
                // $status = 'canceled';
                // $status = 'complet';
                switch($item->payment_status){
                  case 'pending':
                    // echo '<span class="label label-warning">Pending</span>';
                    echo '<center><span class="label label-warning" style="display:block;width:35%;padding:6px;">Pending</span></center>';
                    break;
                  
                  case 'completed':
                    // echo '<span class="label label-primary">Completed</span>';
                    echo '<center><span class="label label-primary" style="display:block;width:35%;padding:6px;">Completed</span></center>';
                    break;
                  
                  case 'canceled':
                    // echo '<span class="label label-danger">Canceled</span>';
                    echo '<center><span class="label label-danger" style="display:block;width:35%;padding:6px;">Canceled</span></center>';
                    break;
                
                  default :
                    // echo '<span class="label label-block">Unknown</span>';
                    echo '<center><span class="label label-block" style="display:block;width:35%;padding:6px;">Unknown</span></center>';
                    break;
                }
              @endphp
            </td>
            <td style="vertical-align:middle;">
              <form action="{{URL('orderDetails',[$item->id])}}" method="post">
                @csrf
                <center>
                  <button type="submit" class="btn btn-primary" style="display:block;width:50%;padding:1px;">
                    Show
                  </button>
                </center>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
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
@endpush