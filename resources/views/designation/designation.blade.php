@extends('layouts.app')

@section('title')
    Designation | Bright Containers
@endsection

@section('breadcrumb')
  @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
    @section('breadcrumb-title')
      &nbsp; Designations
    @endsection
    @section('breadcrumb-item')
      <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Desinations</strong>
      </li>
    @endsection
  @endif
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')

    <form action="{{URL('orderForm')}}" method="get" style="padding-left:20px;">
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#designationForm">
            <i class="fa fa-plus"></i> Add New Designation
        </button>
    </form>
    <div class="text-center animated fadeInDown">
        <div class="modal fade" id="designationForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Desigantion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form class="m-t" role="form" method="POST" action="{{ route('designation.store') }}">
                        @csrf
                        <div class="form-group">
                            <input id="designation" type="text" class="form-control @error('name') is-invalid @enderror" name="designation" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox-content mt-5 mb-5" style="background: white;">
        <big>
            <table class="table text-center table-bordered table-hover" id="designationTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Designation Name</th>
                        <th> Given Access</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($designation as $item)
                        <tr>
                            <td></td>
                            <td>{{$item->designation_name}}</td>
                            <td>{{$item->access}}</td>
                            <td><form action="{{route('designation.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </big>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(function() {
            $('.designation').addClass('active');
        });
    </script>

    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            var t = $('#designationTable').DataTable({
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
