<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
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
            border: 1px solid white;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
    </style>
    <!-- Scripts -->
    @yield('css')

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Select 2 CSS --}}
    {{-- <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet"> --}}

</head>

<body >
    <div id="app">
        @include('layouts.nav')
        <main class="">
            @yield('content')
        </main>
    </div>
  
    {{-- Java Script Section --}}
    @yield('script')
    
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.symbol.js')}}"></script>
    <script src="{{asset('js/plugins/flot/curvedLines.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/demo/peity-demo.js')}}"></script>
    <script src="{{asset('js/demo/chartjs-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    {{-- <script src="{{asset('js/plugins/jquery-ui/jqu ery-ui.min.js')}}"></script> --}}

    <!-- Jvectormap -->
    {{-- <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script> --}}

    <!-- Sparkline -->
    {{-- <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script> --}}

    <!-- Sparkline demo data  -->
    {{-- <script src="{{asset('js/demo/sparkline-demo.js')}}"></script> --}}

    <!-- ChartJS-->
    {{-- <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>  --}}
    
    {{-- Select 2 JS --}}
    {{-- <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script> --}}
    
    <!-- iCheck -->
    {{-- <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script> --}}

    {{-- Country Code JS --}}
     <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            $("#country").select2({
                placeholder: "Select a country",
                allowClear: true
            });
        });
        const url = '/country';
            window.onload = async function() {
            const response = await fetch(url);
            window.data = await response.json();
            conData = data;
            for (var i = 0; i < conData.length; i++) {
                var newOption = new Option(conData[i]['Iso']+" - "+conData[i]['name'],conData[i]['Iso'], false, false);
                $('#country').append(newOption);
            }
            $('#country').trigger('change');
        }
    </script>
    <script>
        $(document).ready(function(){
            var t = $('#ordersTable').DataTable({
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
            });
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        });

    </script>

</body>

</html>