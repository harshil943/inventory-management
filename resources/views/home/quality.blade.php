@extends('layouts.app')

@section('title')
    Quality | Bright Containers
@endsection

@section('content')
<div class="wrapper mt-3 wrapper-content animated fadeInRight">
    <div class="row " style="font-size: 23px">
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <figure>
                        <iframe src="https://www.youtube.com/embed/SfZVujFiFuk?autoplay=1&amp;rel=0" frameborder="0" width=100% height=450px allowfullscreen></iframe>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
                <p style="text-indent: 40px;">
                <big><strong class="text-primary">Blow Moulding </strong></big> is depends on following quality measures, which are strictly followed.
                </p>
                <ul style="margin-top: 25px;">
                        <li>
                            <strong class="text-danger">Article Weight</strong> :Weight of Article measured at regular interval during production.
                        </li>
                        <li>
                            <strong class="text-danger">Uniform Thickness</strong> :Uniform thickness of bottle checking done at regular interval (vertically & horizontally).
                        </li>
                        <li>
                            <strong class="text-danger">Leakage Testing</strong> :Leakage testing check through machine.
                        </li>
                        <li>
                            <strong class="text-danger">Drop Test</strong> :Drop test from the height of 5 feet done at regular interval.
                        </li>
                    </ul>
                <p></p>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        $(function() {
            $('.quality').addClass('active');
            $('.quality').addClass('btn-rounded');
            $('.quality').addClass('blue-bg');
            $(".quality a").css("color","#fff");
        });
    </script>
@endpush
