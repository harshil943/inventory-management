@extends('layouts.app')

@section('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">  
@endsection

@section('content')

<h1>Orders page</h1>
<div class="ibox-content">
  <div class="table-responsive">
    <table class="table text-center table-striped table-bordered table-hover" id="ordersTable" >
      <thead>
        <tr>
          <th></th>
          <th>Product Name</th>
          <th>Total Price</th>
          <th>Order Status</th>
          <th>Payment Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="gradeX">
          <td></td>
          <td>Product 1</td>
          <td>1000</td>
          <td>
            <?php
              $data = 0;
              if($data == 1){
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
              }
              else {
                echo '<i class="fa fa-times" aria-hidden="true"></i>';
              }
            ?>
          </td>
          <td>
            <?php
              $data = 1;
              if($data == 1){
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
              }
              else {
                echo '<i class="fa fa-times" aria-hidden="true"></i>';
              }
            ?>
          </td>
          <td>
            <form action="{{URL('orderDetails',[$data => '1'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            <?php
              $data = 1;
              if($data == 1){
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
              }
              else {
                echo '<i class="fa fa-times" aria-hidden="true"></i>';
              }
            ?>
          </td>
          <td>
            <?php
              $data = 0;
              if($data == 1){
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
              }
              else {
                echo '<i class="fa fa-times" aria-hidden="true"></i>';
              }
            ?>
          </td>
          <td>
            <form action="{{URL('orderDetails',[$data => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
    
  </div>
</div>
@endsection

@section('script')
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
            "order": [[ 1, 'asc' ]],
            pageLength: 25,
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
@endsection