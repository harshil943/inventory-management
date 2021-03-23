
 <nav class="navbar navbar-expand-md navbar-light shadow-sm font-weight-bold">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">
                    Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">
                    About us
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product Category
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($navCategory as $item)
                      <a class="dropdown-item" href="{{url('productCategory',['categoryData'=>$item])}}">{{$item['category_name']}}</a>
                    @endforeach
                    {{-- <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a> --}}
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                      Quality
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('brochure')}}">
                      Brochure
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                      Contact Us
                    </a>
                </li>
              </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link btn bg-white border border-dark px-3 text-dark font-weight-bold" href="{{ route('login') }}">{{ __('Log in') }}</a>
                </li>
                @endif


                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link px-3 btn border border-dark text-light ml-3 font-weight-bold" style="background-color: #007c89" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle btn text-light px-3 font-weight-bold" style="background-color: #007c89 " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ url('/orders') }}" class="dropdown-item">Oreder Details</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            {{ __('Log out') }}
                        </a>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
