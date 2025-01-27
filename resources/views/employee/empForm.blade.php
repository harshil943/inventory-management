@extends('layouts.app')

@section('title')
@if (isset($employeeDetails))
    Edit Employee | Bright Containers
@else
    Add Employee | Bright Containers
@endif
@endsection

@push('css')
    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb')
    @section('breadcrumb-title')
      &nbsp; Add Employee
    @endsection
    @section('breadcrumb-item')
      <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('employee.index') }}">Employee</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Add Employee</strong>
      </li>
    @endsection
@endsection

@section('content')
<div class="text-center animated fadeInDown white-bg my-5" style="padding: 10px;">
    <div class="p-5 border border-rounded border-primary">

        @if (isset($employeeDetails))
        <form class="m-t" role="form" action="{{ route('employee.update',$employeeDetails->id) }}">
            @csrf
            @method('PATCH')
            @else
            <form class="m-t" role="form" action="{{ route('employee.store') }}" method="POST">
                @csrf
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="name">Employee Name</label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" @if (isset($employeeDetails->id)) value="{{$employeeDetails->employee_name}}" @endif value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                                </div>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-sm-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" @if (isset($employeeDetails->id)) value="{{$employeeDetails->email_id}}" @endif value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        </div>
                    </div>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="number">Mobile No.</label>
                        </div>
                        <div class="col-sm-8">
                            <input id="mobile" type="text" class="form-control" name="mobile" @if (isset($employeeDetails->id)) value="{{$employeeDetails->employee_name}}" @endif required placeholder="Mobile Number">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="address">Recidance Address</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea id="residence_add" name="residence_add" rows="3" class="form-control" placeholder="Recidence Address" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            Bank Name
                        </div>
                        <div class="col-sm-8">
                            <input id="bank_name" type="text" class="form-control" name="bank_name" @if (isset($employeeDetails->id)) value="{{$employeeDetails->bank_name}}" @endif placeholder="Bank Name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="account_number">Account Number</label>
                        </div>
                        <div class="col-sm-8">
                            <input id="bank_account_number" type="text" class="form-control" name="bank_account_number" @if (isset($employeeDetails->id)) value="{{$employeeDetails->bank_account_number}}" @endif placeholder="Bank Account Number">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="ifsc">IFSC Code</label>
                        </div>
                        <div class="col-sm-8">
                            <input id="bank_IFSC_code" type="text" class="form-control" name="bank_IFSC_code" @if (isset($employeeDetails->id)) value="{{$employeeDetails->bank_IFSC_code}}" @endif placeholder="Bank IFS code">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="salary">Salary</label>
                        </div>
                        <div class="col-sm-8">
                            <input id="salary" type="text" class="form-control" name="salary" @if (isset($employeeDetails->id)) value="{{$employeeDetails->salary}}" @endif placeholder="Salary">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="designation">Designation</label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control" id="designation" name="designation" @if (isset($employeeDetails->id)) value="{{$employeeDetails->designation}}" @endif required>
                            <option></option>
                            @foreach ($designation as $item)
                            <option value="{{$item->id}}">{{$item->designation_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($employeeDetails))
        <button type="submit" class="ladda-button btn btn-primary m-b" data-style="expand-right">Edit Employee</button>
        @else
        <button type="submit" class="ladda-button btn btn-primary m-b" data-style="expand-right">Add Employee</button>
        @endif
    </form>
</div>
</div>
@endsection

@push('script')

    {{-- Select 2 JS --}}
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $("#designation").select2({
                placeholder: "Select Designation",
                allowClear: true
            });
        });
    </script>
    <script>
        $(function() {
            $('.employee').addClass('active');
            $('.employee ul').addClass('in');
            $('.employee ul li:nth-child(1)').addClass('active');
        });
    </script>
@endpush
