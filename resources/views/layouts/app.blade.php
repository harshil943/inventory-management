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

    <!-- Toastr style -->
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    @stack('css')

    <style>
        #back2Top {
    width: 40px;
    line-height: 40px;
    overflow: hidden;
    z-index: 999;
    display: none;
    cursor: pointer;
    -moz-transform: rotate(270deg);
    -webkit-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
    position: fixed;
    bottom: 50px;
    right: 0;
    background-color: #DDD;
    color: #555;
    text-align: center;
    font-size: 30px;
    text-decoration: none;
}
#back2Top:hover {
    background-color: #DDF;
    color: #000;
}

    </style>
</head>

{{-- <body style="background-image: linear-gradient(to top,#0997a7,#fff 80%);"> --}}
<body>
    <div id="wrapper">
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
    <a id="back2Top" title="Back to top" href="#">&#10148;</a>
    @if (Auth::user() != null)
        @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
            <div class="footer">
                <div>
                    <strong>Copyright</strong> Brighter Containers © 2014-2019
                </div>
            </div>

            @else
                 <div class="">
                     <div>
                         <strong>Copyright</strong> Brighter Containers © 2014-2019
                     </div>
                 </div>
            @endif
    @else
        <div class="">
            <div>
                <strong>Copyright</strong> Brighter Containers © 2014-2019
            </div>
        </div>
    @endif


        {{-- <div class="bg-white p-3" style="position: relative;left:0;bottom:0;width:100%;">
            <div>
                <strong>Copyright</strong> Bright Containers © 2014-2018
            </div>
        </div> --}}


        {{-- <div class="bg-white footer p-3" style="position: fixed;left:0;bottom:0;width:100%;">
            <div>
                <strong>Copyright</strong> Bright Containers © 2014-2018
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

    <!-- Toastr script -->
    <script src="js/plugins/toastr/toastr.min.js"></script>
    {{-- Notification query --}}
    <script>
        $('#markasread').click(function(){
            $.get('/markasread');
        })
    </script>

    <script>


        @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
        @endif


        @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}");
        @endif


        @if(Session::has('warning'))
                toastr.warning("{{ Session::get('warning') }}");
        @endif


        @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
        @endif


      </script>
    <script type="text/javascript">
        function genToast(type,msg,title,link) {
            if(link == null)
            {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    positionClass: 'toast-top-right',
                    onclick: null,
                    showDuration: 400,
                    hideDuration: 1000,
                    timeOut: 7000,
                    extendedTimeOut: 1000,
                    showEasing: 'swing',
                    hideEasing: 'linear',
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                };
            }
            else
            {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    positionClass: 'toast-top-right',
                    onclick: function () {window.location.href = link;},
                    showDuration: 400,
                    hideDuration: 1000,
                    timeOut: 7000,
                    extendedTimeOut: 1000,
                    showEasing: 'swing',
                    hideEasing: 'linear',
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                };
            }
            toastr[type](msg, title);
        };

    </script>

    @if(Auth::user())
        @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
            <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
            <script>
                var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
                    cluster: '{{env("PUSHER_APP_CLUSTER")}}',
                    encrypted: true
                });
                var channel = pusher.subscribe('quote-request');
                channel.bind('App\\Events\\QuoteRequest', function() {
                    genToast('info','New Quotation Request Generated','Quote Request','/quotation');
                });
            </script>
        @endif
    @endif

    <script>
        /*Scroll to top when arrow up clicked BEGIN*/
        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 100) {
                $('#back2Top').fadeIn();
            } else {
                $('#back2Top').fadeOut();
            }
        });
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        });
        /*Scroll to top when arrow up clicked END*/

    </script>
    <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>

    @stack('script')

</body>

</html>
