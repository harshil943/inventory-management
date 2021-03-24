@extends('layouts.app')

@section('title')
    Consignee | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<div class="ibox-content">
    <div class="table-responsive">
      <table class="table text-center  table-bordered table-hover" id="consigneeTable" >
        <thead>
          <tr>
            <th>Sr.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>GST Number</th>
            <th>State Code</th>
            <th>Address</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($consignees as $item)
                <tr>
                    <td></td>
                    <td>{{$item->name}}</td>
                    <td> @if ($item->emmail != null)
                            {{$item->email}}
                        @else
                            -
                        @endif </td>
                    <td>{{$item->number}}</td>
                    <td>{{$item->gst_number}}</td>
                    <td>{{$item->state_code}}</td>
                    <td>{{$item->address}}</td>
                    
                    <td colspan="3"><form action="{{route('consignee.destroy',$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('consignee.edit',$item->id)}}" class="btn-rounded btn-secondary fa fa-pencil ml-3 p-2" style="text-decoration:none;:70%;padding:5px;">Edit</a>
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
        $('.consignee').addClass('active');
        $('.consignee ul').addClass('in');
        $('.consignee ul li:nth-child(2)').addClass('active');
    });
</script>
<script>
    $(document).ready(function(){
        var t = $('#consigneeTable').DataTable({
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