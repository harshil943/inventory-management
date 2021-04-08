@extends('layouts.app')

@section('title')
@if (isset($raw))

Edit Material | Bright Containers
@else

Add Material | Bright Containers
@endif
@endsection

@push('css')
    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="gray-bg container">
    <div class="text-center loginscreen animated fadeInDown p-3 my-5">
        <div class="mt-3 p-5 border border-rounded border-primary">
            @if (isset($raw))

            <h3>Edit Material to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('rawmaterial.update',$raw->id) }}" method="post">
                @csrf
                @method('PATCH')
            @else
            <h3>Add Material to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('rawmaterial.store') }}" method="POST">
                @csrf
            @endif
                    <div class="row text-left">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label class="form-label">Material Name</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="material_name" @if (isset($raw->material_name))
                                            value="{{$raw->material_name}}"
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
                                        <input type="text" class="form-control" name="quantity" @if (isset($raw->quantity))
                                            value="{{$raw->quantity}}"
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
                                        <input type="text" class="form-control" name="cost" @if (isset($raw->cost_per_quantity))
                                            value="{{$raw->cost_per_quantity}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($raw))

                    <button type="submit" class="btn btn-primary">Edit Material</button>
                    @else

                    <button type="submit" class="btn btn-primary">Add Material</button>
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
        $('.raw').addClass('active');
        $('.raw ul').addClass('in');
        $('.raw ul li:nth-child(1)').addClass('active');
    });
</script>
@endpush
