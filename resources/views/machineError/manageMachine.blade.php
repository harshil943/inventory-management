@extends('layouts.app')

@section('title')
    Inventory | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<div class="ibox-content">
    <div class="table-responsive">
      <table class="table text-center  table-bordered table-hover" id="machineTable" >
        <thead>
          <tr>
            <th>Sr.No</th>
            <th>Asset Name</th>
            <th>Error Details</th>
            <th>Error Status</th>
            <th>Error Cost</th>
            <th>Issue Date</th>
            <th>Solved Date</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($machine as $item)
                <tr>
                    <td></td>
                    <td>{{$item->asset->asset_name}}</td>
                    <td> {{$item->error_details}}</td>
                    @if ($item->error_status == '0')

                    <td><center><span class="label label-warning" style="display:block;width:75%;padding:6px;">Pending</span></center></td>
                    @else

                    <td><center><span class="label label-success" style="display:block;width:75%;padding:6px;">Solved</span></center></td>
                    @endif
                    <td> {{$item->cost}}</td>
                    <td> {{$item->error_issue_date}}</td>
                    <td> {{$item->error_solve_date}}</td>
                    <td colspan="3"><form action="{{route('machine.destroy',$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('machine.edit',$item->id)}}" class="btn-rounded btn-secondary fa fa-pencil ml-3 p-2" style="text-decoration:none;:70%;padding:5px;">Edit</a>
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
        $('.machine').addClass('active');
        $('.machine ul').addClass('in');
        $('.machine ul li:nth-child(2)').addClass('active');
    });
</script>
<script>
    $(document).ready(function(){
        var t = $('#machineTable').DataTable({
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
