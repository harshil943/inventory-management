@extends('layouts.app')

@section('title')
    Designation | Bright Containers
@endsection


@section('content')
    <div class="gray-bg container">
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#designationForm">
            Add Designation
        </button>
        <div class="text-center loginscreen animated fadeInDown">
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
        <div class="ibox-content mt-5 mb-5">
            <div class="table-responsive">
              <table class="table text-center table-bordered table-hover" id="ordersTable" >
                <thead>
                  <tr>
                    <th>Designation Name</th>
                    <th> Given Access</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($designation as $item)
                    <tr>
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

            </div>
          </div>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            $('.employee').addClass('active');
            $('.employee ul').addClass('in');
            $('.employee ul li:nth-child(3)').addClass('active');
        });
    </script>
@endpush