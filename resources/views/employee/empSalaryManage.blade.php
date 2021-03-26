@extends('layouts.app')

@section('title')
    Raw Material | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<div class="ibox-content">
    <div class="table-responsive">
      <table class="table text-center  table-bordered table-hover" id="expenseTable" >
        <thead>
          <tr>
            <th>Sr.No</th>
            <th>Employee Name</th>
            <th>Salary</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($salary as $item)
                <tr>
                    <td></td>
                    <td>{{$item->employee->employee_name}}</td>
                    <td> {{$item->salary_paid}}</td>
                    <td colspan="3"><form action="{{route('empsalary.destroy',$item->id)}}" method="post">
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
        $('.employee-salary').addClass('active');
        $('.employee-salary ul').addClass('in');
        $('.employee-salary ul li:nth-child(2)').addClass('active');
    });
</script>
<script>
    $(document).ready(function(){
        var t = $('#expenseTable').DataTable({
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
