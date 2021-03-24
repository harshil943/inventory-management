@extends('layouts.app')

@section('title')
    Quotation | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="ibox-content">
    <div class="table-responsive">
      <table class="table text-center  table-bordered table-hover" id="quoteTable" >
        <thead>
          <tr>
            <th>Sr.No</th>
            <th>Campany Name</th>
            <th>Campony Email</th>
            <th>Contact Number</th>
            <th>Product Name</th>
            <th>Product Size</th>
            <th>Product Quantity</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($quotes as $item)
                <tr>
                    <td></td>
                    <td>{{$item->company_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->contact_number}}</td>
                    <td>{{$item->product->product_name}}</td>
                    <td>{{$item->select_product_size}}</td>
                    <td>{{$item->quantity_needed}}</td>
                    
                    <td colspan="3"><form action="{{route('quotation.destroy',$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-rounded btn-danger fa fa-trash ml-3 p-2" style="text-decoration:none;:70%;padding:5px;">Delete</button>
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
        $('.quotation').addClass('active');
    });
</script>
<script>
    $(document).ready(function(){
        var t = $('#quoteTable').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            pageLength: 5,
            responsive: true
            
        });
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    });
  </script>
@endpush