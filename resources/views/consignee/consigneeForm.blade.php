@extends('layouts.app')

@section('title')
@if (isset($consignee))

Edit Consignee | Bright Containers
@else

Add Consignee | Bright Containers
@endif
@endsection

@section('content')
<div class="gray-bg container-fluid">
    <div class="text-center p-3 loginscreen animated fadeInDown">
        <div class="p-5 border border-rounded border-primary">
            @if (isset($consignee))

            <h3>Edit Consignee to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('consignee.update',$consignee->id) }}" method="post">
                @csrf
                @method('PATCH')
            @else
            <h3>Add Consignee to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('consignee.store') }}" method="POST">
                @csrf
            @endif
                    <div class="row text-left mt-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="consignee_name" class="">Consignee Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="consignee_name" type="text" name="consignee_name" class="form-control" @if(isset($consignee->name)) value="{{$consignee->name}}" @endif placeholder="Consignee Name" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Email</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="email" placeholder="Email" @if(isset($consignee->email)) value="{{$consignee->email}}" @endif required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Contact Number</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="number" placeholder="Cotact Number" @if(isset($consignee->number)) value="{{$consignee->number}}" @endif required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <Label style="padding:10px;" class="mt-3">Address</Label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="address" id="address" placeholder="Address" @if(isset($consignee->address)) value="{{$consignee->address}}" @endif cols="40" rows="2" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <Label style="padding:10px;">GST Number</Label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="gst" placeholder="GST Number" @if(isset($consignee->gst_number)) value="{{$consignee->gst_number}}" @endif required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <Label style="padding:10px;">State Code</Label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="state_code" placeholder="State Code" @if(isset($consignee->state_code)) value="{{$consignee->state_code}}" @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($consignee->id))

                    <button type="submit" class="btn btn-primary">Edit Consignee</button>
                    @else

                    <button type="submit" class="btn btn-primary">Add Consignee</button>
                    @endif
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')

<script>
    $(function() {
        $('.consignee').addClass('active');
        $('.consignee ul').addClass('in');
        $('.consignee ul li:nth-child(1)').addClass('active');
    });
</script>
@endpush
