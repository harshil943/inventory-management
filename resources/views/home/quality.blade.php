@extends('layouts.app')

@section('title')
    Quality | Bright Containers
@endsection

@section('content')
<div class="wrapper mt-3 wrapper-content animated fadeInRight">
    <div class="row " style="font-size: 23px">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <figure>
                        <iframe width="850" height="500" src="https://www.youtube.com/embed/SfZVujFiFuk?autoplay=1&amp;rel=0" frameborder="0" allowfullscreen></iframe>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
                <p style="text-indent: 40px;">
                <big><strong>Blow Molding </strong></big> is depends on following quality measures, which are strictly followed.
                </p>
                <ul style="margin-top: 25px;">
                        <li>
                            Article Weight :Weight of Article measured at regular interval during production.
                        </li>
                        <li>
                            Uniform Thickness :Uniform thickness of bottle checking done at regular interval (vertically & horizontally).
                        </li>
                        <li>
                            Leakage Testing :Leakage testing check through machine.
                        </li>
                        <li>
                            Drop Test :Drop test from the height of 5 feet done at regular interval.
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
            $(".quality").css("background","#0997a7");
            $(".quality a").css("color","#fff");
        });
    </script>
@endpush
