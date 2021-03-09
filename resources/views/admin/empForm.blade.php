@extends('layouts.app')

@section('title')
    Add Employee | Bright Containers
@endsection

@push('css')

    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">

@endpush

@section('content')
    
@include('admin.adminNav')
<div class="gray-bg container">
    <div class="text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">Logo</h1>
            </div>
            <h3>Add Employee to <br>Bright Containers</h3>
            <p>Add Employee to see it in action.</p>
            <form class="m-t" role="form" method="POST" action="{{ route('employee.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
        
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="mobile" type="text" class="form-control" name="mobile" required placeholder="Mobile Number">
                        </div>
                        <div class="form-group">
                            <textarea id="residence_add" name="residenence_add" rows="3" class="form-control" placeholder="Recidance Address" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input id="bank_name" type="text" class="form-control" name="bank_name"  placeholder="Bank Name">
                        </div>
                        <div class="form-group">
                            <input id="bank_account_number" type="text" class="form-control" name="bank_account_number" placeholder="Bank Account Number">
                        </div>          
                        <div class="form-group">
                            <input id="bank_IFSC_code" type="text" class="form-control" name="bank_IFSC_code" placeholder="Bank IFSC code">
                        </div>          
                        <div class="form-group">
                            <input id="salary" type="text" class="form-control" name="salary" placeholder="Salary">
                        </div>
                        <select class="form-control" id="country" name="country" required>
                            <option></option>
                        </select>
                    </div>
                </div>              
                <button type="submit" class="ladda-button btn btn-primary m-b" data-style="expand-right">Add Employee</button>    
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')

    {{-- Select 2 JS --}}
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
    
    {{-- Country Code JS --}}
    <script>
        $(document).ready(function(){
            $("#country").select2({
                placeholder: "Select Designation",
                allowClear: true
            });
        });
    </script>
@endpush