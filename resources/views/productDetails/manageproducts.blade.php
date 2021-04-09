@extends('layouts.app')

@section('title')
    Products | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<div class="ibox-content">
    <div class="table-responsive">
      <table class="table text-center table-bordered table-hover" id="productTable" >
        <thead>
          <tr>
            <th>Sr.No</th>
            <th>Product Category</th>
            <th>Product Name</th>
            <th>Available Sizes</th>
            <th>Bottle Colors</th>
            <th>Cap Colors</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td></td>
                    <td>{{$item->category->category_name}}</td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->available_sizes}}</td>
                    <td>{{$item->available_color_bottle}}</td>
                    <td>{{$item->available_color_cap}}</td>
                    <td colspan="3"><form action="{{route('product.destroy',$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('product.show',$item->id)}}" class="btn-rounded btn-primary fa fa-eye  p-2" style="text-decoration:none;:70%;padding:5px;">Show</a>
                        <a href="{{route('product.edit',$item->id)}}" class="btn-rounded btn-secondary fa fa-pencil  p-2" style="text-decoration:none;:70%;padding:5px;">Edit</a>
                        <button type="submit" class="btn-rounded btn-danger fa fa-trash  p-2" style="text-decoration:none;:70%;padding:5px;">Delete</button>
                    </form></td>
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
    $(function() {
        $('.products').addClass('active');
        $('.products ul').addClass('in');
        $('.products ul li:nth-child(2)').addClass('active');
    });
</script>
<script>
    $(document).ready(function(){
        var t = $('#productTable').DataTable({
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
@endpush
