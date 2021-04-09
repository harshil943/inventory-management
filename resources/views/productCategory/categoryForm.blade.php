@extends('layouts.app')

@section('title')
@if (isset($category))

Edit Category | Bright Containers
@else

Add Category | Bright Containers
@endif
@endsection

@section('content')
<div class="gray-bg container">
    <div class="text-center loginscreen animated fadeInDown p-3 my-5">
        <div class="mt-3 p-5 border border-rounded border-primary">
            @if (isset($category))

            <h3>Edit Category to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            @else
            <h3>Add Category to <br>Bright Containers</h3>
            <form class="m-t mt-3" role="form"  action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            @endif
                    <div class="row text-left">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="category_name" class="mt-2">Category Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="category_name" type="text" name="category_name" class="form-control" @if(isset($category->category_name)) value="{{$category->category_name}}" @endif placeholder="Category Name" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Brochure File</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="brochure_file" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <Label style="padding:10px;">Category Image</Label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="category_image" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($category->id))

                    <button type="submit" class="btn btn-primary">Edit Category</button>
                    @else

                    <button type="submit" class="btn btn-primary">Add Category</button>
                    @endif
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')

<script>
    $(function() {
        $('.product_category').addClass('active');
        $('.product_category ul').addClass('in');
        $('.product_category ul li:nth-child(1)').addClass('active');
    });
</script>
@endpush
