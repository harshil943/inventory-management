<!doctype html>
<html>
<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    
    <style type="text/css">
        .jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
    </style>
    <!-- Scripts -->

    {{-- CSS Styles --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet">  

    
</head>

<body >
  @php
      dd($order);
  @endphp  
  <h1>Orders page</h1>

    <div class="ibox-content">
      <div class="table-responsive">
        <table class="table text-center table-striped table-bordered table-hover" id="ordersTable" >
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
                <td></td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->quantity}}</td>
                <td>
                  @php
                    // $status = 'pending';
                    // $status = 'shipped';
                    // $status = 'canceled';
                    // $status = 'completed';
                    // $status = 'complet';
                    switch($item->order_status){
                      case 'pending':
                        echo '<span class="label label-warning">Pending</span>';
                        break;
                      
                      case 'shipped':
                        echo '<span class="label label-success">Shipped</span>';
                        break;
                      
                      case 'canceled':
                        echo '<span class="label label-danger">Canceled</span>';
                        break;
                    
                      case 'completed':
                        echo '<span class="label label-primary">Completed</span>';
                        break;
                  
                      default :
                        echo '<span class="label label-block">Unknown</span>';
                        break;
                    }
                  @endphp
                </td>
                <td>
                  @php
                    // $status = 'pending';
                    // $status = 'completed';
                    // $status = 'canceled';
                    // $status = 'complet';
                    switch($item->payment_status){
                      case 'pending':
                        echo '<span class="label label-warning">Pending</span>';
                        break;
                      
                      case 'completed':
                        echo '<span class="label label-primary">Completed</span>';
                        break;
                      
                      case 'canceled':
                        echo '<span class="label label-danger">Canceled</span>';
                        break;
                    
                      default :
                        echo '<span class="label label-block">Unknown</span>';
                        break;
                    }
                  @endphp
                </td>
                <td>
                  <form action="{{URL('orderDetails',[$item->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                      Show
                  </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>
    </div>

    {{-- Java Script Section --}}
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>

    <script src="/js/plugins/dataTables/datatables.min.js"></script>
    <script src="/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){
            var t = $('#ordersTable').DataTable({
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                pageLength: 10,

    













    
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

</body>

</html>