@extends('layouts.app')

@section('title')
@if (isset($expense))

Edit Expense | Bright Containers
@else

Add Expense | Bright Containers
@endif
@endsection

@push('css')
    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="gray-bg container">
    <div class="text-center loginscreen animated fadeInDown">
        <div class="mt-3">
            <h3>Add Salary to <br>Bright Container's Employee </h3>
            <form class="m-t mt-3" role="form"  action="{{ route('empsalary.store') }}" method="POST">
                @csrf
                    <div class="row text-left">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label" for="employee_name">Employee Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="employee_name" name="employee_name"required>
                                            <option></option>
                                           @foreach ($employees as $item)
                                               <option value="{{$item->id}}">{{$item->employee_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Salary</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="salary"  required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Add Salary</button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
    {{-- Select 2 JS --}}
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $("#employee_name").select2({
                placeholder: "Select Product",
                allowClear: true
            });
        });
    </script>
<script>
    $(function() {
        $('.employee-salary').addClass('active');
        $('.employee-salary ul').addClass('in');
        $('.employee-salary ul li:nth-child(1)').addClass('active');
    });
</script>
@endpush
