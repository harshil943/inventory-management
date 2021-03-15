@extends('layouts.app')

@section('title')
    Employees | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="ibox-content">
    <div class="table-responsive">
      <table class="table text-center table-bordered table-hover" id="ordersTable" >
        <thead>
          <tr>
            <th>Sr. No.</th>
            <th>Employee Name</th>
            <th>Employee Email</th>
            <th>Mobile Number</th>
            <th>Residence Address</th>
            <th>Bank Name</th>
            <th>Bank Account Number</th>
            <th>Bank ISFC Code</th>
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
                @php
                    $current_id = $item->id;
                @endphp
                <td>{{$item->employee_name}}</td>
                <td>{{$item->email_id}}</td>
                <td>{{$item->mobile_number}}</td>
                <td>{{$item->residence_address}}</td>
                <td>{{$item->bank_name}}</td>
                <td>{{$item->bank_account_number}}</td>
                <td>{{$item->bank_ISFC_code}}</td>
                <td>{{$item->salary}}</td>
                <td>{{$item->designation_id}}</td>
                <td><a href="{{route('employee.edit',$item->id)}}" class="btn btn-success rounded">Edit</a></td>
                <td><form action="{{route('employee.destroy',$item->email_id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                  @if ($item->admin == 1)
                      <a href="{{url('removeadmin',$item->email_id)}}">
                        <button class="btn btn-dark">Remove Admin</button>
                      </a>
                  @else
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary admin-btn" data-toggle="modal" data-target="#makeAdmin" data-whatever="{{$item->id}}">
                        Make Admin
                      </button>
                  @endif

                   {{-- Modal --}}
                      <div class="modal fade" id="makeAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Give Temporary Password</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form class="setPass m-t" role="form" method="POST" >
                              @csrf
                            <div class="modal-body">
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password"  required placeholder="Make admin password" autofocus>
                                    </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Add Password</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
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
    <script>
        $(document).on("click", ".admin-btn", function () {
            var itemid= $(this).attr('data-whatever');
            $(".setPass").attr("action","/makeAdmin/" + itemid)
        });
    </script>
    <script>
        $(function() {
            $('.employee').addClass('active');
        });
    </script>
@endpush
