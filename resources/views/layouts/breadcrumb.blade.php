<div class="row wrapper" style="background: lightgrey">
    {{-- <div class="col-sm-1 align-self-center p-0">
        <a class="navbar-minimalize text-dark" href="#">
            <big><big><big><big><i class="fa fa-bars"></i></big></big></big></big>
        </a>
    </div> --}}
    <div class="col-sm-11">
        <br>
        <h2>
            @yield('breadcrumb-title')
        </h2>
        <ol class="breadcrumb" style="background: lightgrey">
            @yield('breadcrumb-item')
        </ol>
    </div>
    {{-- <div class="col-sm-1 align-self-center align-right">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
    </div> --}}
</div>
