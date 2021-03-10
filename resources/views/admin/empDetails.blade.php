@extends('layouts.app')

@section('title')
    Employees | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')
@include('admin.adminNav')

<div class="ibox-content">
    <div class="table-responsive">
      <table class="table text-center table-bordered table-hover" id="ordersTable" >
        <thead>
          <tr>
            <th></th>
            <th>Employee Name</th>
            <th>Employee Email</th>
            <th>Mobile Number</th>
            <th>Residence Address</th>
            <th>Bank Name</th>
            <th>Bank Account Number</th>
            <th>Bank IFSC Code</th>
            <th>Salary</th>
            <th>Designation</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($employees as $item)
            <tr>
                <td></td>
                <td>{{$item->employee_name}}</td>
                <td>{{$item->email_id}}</td>
                <td>{{$item->mobile_number}}</td>
                <td>{{$item->residence_address}}</td>
                <td>{{$item->bank_name}}</td>
                <td>{{$item->bank_account_number}}</td>
                <td>{{$item->bank_IFSC_code}}</td>
                <td>{{$item->salary}}</td>
                <td>{{$item->designation}}</td>
                <td><a href="{{route('employee.edit',$item->id)}}" class="btn btn-warning">Edit</a></td>
                <td><form action="{{route('employee.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td> <a href="" class="btn btn-primary">Make Admin</a> </td>
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
