@extends('layouts.app')

@section('title')
    Category | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endpush

@section('content')
{{-- {{dd($category)}} --}}
<div class="ibox-content">
    <div class="table-responsive">
      <table class="table text-center  table-bordered table-hover" id="categoryTable" >
        <thead>
          <tr>
            <th>Sr.No</th>
            <th>Category Name</th>
            <th>category Image</th>
            <th>Category Brochure</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td></td>
                    <td>{{$item->category_name}}</td>
                    <td>
                        {{-- <img alt="image" class="img-preview-sm" src="{{asset('storage/category/'.$item->category_image_name)}}" alt="{{$item->category_image_name}}"> --}}
                        <img alt="image" class="img-preview-sm" src="{{asset('storage/category/pesticide_bottle.png')}}" alt="Category Image">
                    </td>
                    <td><a href="{{url('brochure',[$item->id])}}">{{$item->category_brochure_file_name}}</a></td>
                    <td colspan="3"><form action="{{route('category.destroy',$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('category.show',$item->id)}}" class="btn-rounded btn-primary fa fa-eye ml-3 p-2" style="text-decoration:none;:70%;padding:5px;">Show</a>
                        <a href="{{route('category.edit',$item->id)}}" class="btn-rounded btn-secondary fa fa-pencil ml-3 p-2" style="text-decoration:none;:70%;padding:5px;">Edit</a>
                        <button type="submit" class="btn-rounded btn-danger fa fa-trash ml-3 p-2" style="text-decoration:none;:70%;padding:5px;">Delete</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
      </table>


    </div>
</div>
@endsection

@push('script')
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(function() {
        $('.product').addClass('active');
        $('.product ul').addClass('in');
        $('.product ul li:nth-child(4)').addClass('active');
    });
</script>
<script>
    $(document).ready(function(){
        var t = $('#categoryTable').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            pageLength: 5,
            responsive: true

        });
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    });
  </script>
@endpush
