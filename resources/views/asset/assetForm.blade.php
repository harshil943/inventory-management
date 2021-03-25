@extends('layouts.app')

@section('title')
@if (isset($asset))
    
Edit Asset | Bright Containers
@else
    
Add Asset | Bright Containers
@endif
@endsection



@section('content')
<div class="gray-bg container">
    <div class="text-center loginscreen animated fadeInDown">
        <div class="mt-3">
            @if (isset($asset))
                
            <h3>Edit Asset to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('asset.update',$asset->id) }}" method="post" >
                @csrf
                @method('PATCH')
            @else
            <h3>Add Asset to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('asset.store') }}" method="POST" >
                @csrf
            @endif
                    <div class="row text-left">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Asset Name</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="asset_name" @if (isset($asset->asset_name)
)                                            value="{{$asset->asset_name}}"
                                        @endif required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Asset Amount</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="asset_amount" @if (isset($asset->asset_amount))
                                        value="{{$asset->asset_amount}}"
                                    @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Purchase Date</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="purchase_date" @if (isset($asset->purchase_date))
                                        value="{{$asset->purchase_date}}"
                                    @endif required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Selling Date</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="selling_date" @if (isset($asset->selling_date))
                                        value="{{$asset->selling_date}}"
                                    @endif required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($asset))
                        
                    <button type="submit" class="btn btn-primary">Edit Asset</button>
                    @else
                        
                    <button type="submit" class="btn btn-primary">Add Asset</button>
                    @endif
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')

<script>
    $(function() {
        $('.asset').addClass('active');
        $('.asset ul').addClass('in');
        $('.asset ul li:nth-child(1)').addClass('active');
    });
</script>
@endpush