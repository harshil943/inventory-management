@extends('layouts.app')

@section('title')
@if (isset($machine))

Edit Machine Error | Bright Containers
@else

Add Machine Error | Bright Containers
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
            @if (isset($machine))

            <h3>Edit Machine Error to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('machine.update',$machine->id) }}" method="post" >
                @csrf
                @method('PATCH')
            @else
            <h3>Add Machine Error to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('machine.store') }}" method="POST" >
                @csrf
            @endif
                    <div class="row text-left">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label ml-3" for="asset">Asset Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="asset_name" name="asset_name" required>
                                            <option></option>
                                            @foreach ($asset as $item)
                                            @if (isset($machine))
                                            <option value="{{$item->id}}" selected>{{$item->asset_name}}</option>
                                            @else
                                            <option value="{{$item->id}}">{{$item->asset_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Error Detail</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="error_detail" @if (isset($machine->error_details))
                                            value="{{$machine->error_details}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Issue Date</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="issue_date" @if (isset($machine->error_issue_date))
                                            value="{{$machine->error_issue_date}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label ml-3" for="product">Error Status</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="error_status" name="error_status" required>
                                            <option></option>
                                            <option value="1">Solved</option>
                                            <option value="0">Panding</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Error Cost</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="cost" @if (isset($machine->cost))
                                            value="{{$machine->cost}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Solved Date</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="solved_date" @if (isset($machine->error_solve_date))
                                            value="{{$machine->error_solve_date}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($machine))

                    <button type="submit" class="btn btn-primary">Edit Machine Error</button>
                    @else

                    <button type="submit" class="btn btn-primary">Add Machine Error</button>
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
            $("#asset_name").select2({
                placeholder: "Select Asset",
                allowClear: true
            });
            $("#error_status").select2({
                placeholder: "Select Error Status",
                allowClear: true
            });
        });
    </script>
<script>
    $(function() {
        $('.machine').addClass('active');
        $('.machine ul').addClass('in');
        $('.machine ul li:nth-child(1)').addClass('active');
    });
</script>
@endpush
