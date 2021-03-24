<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="HDPE Plastic Bottle Manufacturing Company." name="description">
    <meta content="Jainam Shah" name="author">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset("img/bright_logo_small.png")}}" type="image/x-icon">

    <title>@yield('title')</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <style type="text/css">
        .jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid black;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
    </style>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- CSS Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('css')

</head>

{{-- <body style="background-image: linear-gradient(to top,#0997a7,#fff 80%);"> --}}
<body>
    <div id="wrapper" >
        @if(Auth::user())
            @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                @include('layouts.adminNav')
            @else
                @include('layouts.nav')
            @endif
        @else
            @include('layouts.nav')
        @endif
        @if(Auth::user())
            @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                <div id="wrapper" style="margin-top:0px;">
                    @include('layouts.breadcrumb')
            @else
                <div id="wrapper" style="margin-top:104px;">
            @endif
        @else
            <div id="wrapper" style="margin-top:104px;">
        @endif
            @yield('content')
        </div>
    </div>

    {{-- <div class="footer fixed">
        <div>
            <strong>Copyright</strong> Example Company © 2014-2018
        </div>
    </div> --}}

    {{-- Java Script Section --}}
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- Flot -->
    {{-- <script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script> --}}
    {{-- <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script> --}}
    {{-- <script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script> --}}
    {{-- <script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script> --}}
    {{-- <script src="{{asset('js/plugins/flot/jquery.flot.symbol.js')}}"></script> --}}
    {{-- <script src="{{asset('js/plugins/flot/curvedLines.js')}}"></script> --}}

    <!-- Peity -->
    {{-- <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/demo/peity-demo.js')}}"></script> --}}
    {{-- <script src="{{asset('js/demo/chartjs-demo.js')}}"></script>     --}}

    <!-- jQuery UI -->
    {{-- <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}

    <!-- Jvectormap -->
    {{-- <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script> --}}

    <!-- Sparkline -->
    {{-- <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script> --}}

    <!-- Sparkline demo data  -->
    {{-- <script src="{{asset('js/demo/sparkline-demo.js')}}"></script> --}}

    <!-- ChartJS-->
    {{-- <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>  --}}

    @stack('script')

</body>

</html>
