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
    <div class="text-center loginscreen animated fadeInDown my-5 p-3">
        <div class="mt-3 p-5 border border-rounded border-primary">
            @if (isset($expense))

            <h3>Edit Expense to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('expense.update',$expense->id) }}" method="post">
                @csrf
                @method('PATCH')
            @else
            <h3>Add Expense to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('expense.store') }}" method="POST">
                @csrf
            @endif
                    <div class="row text-left">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label class="form-label">Expense Detail</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="expense_details" @if (isset($expense->expense_details))
                                            value="{{$expense->expense_details}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label class="form-label" >Quantity</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="quantity" @if (isset($expense->quantity))
                                            value="{{$expense->quantity}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Cost Per Quantity</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="cost" @if (isset($expense->cost_per_quantity))
                                            value="{{$expense->cost_per_quantity}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($expense))

                    <button type="submit" class="btn btn-primary">Edit Expense</button>
                    @else

                    <button type="submit" class="btn btn-primary">Add Expense</button>
                    @endif
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
            $("#product").select2({
                placeholder: "Select Product",
                allowClear: true
            });
        });
    </script>
<script>
    $(function() {
        $('.expense').addClass('active');
        $('.expense ul').addClass('in');
        $('.expense ul li:nth-child(1)').addClass('active');
    });
</script>
@endpush
