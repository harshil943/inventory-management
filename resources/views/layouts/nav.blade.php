<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm font-weight-bold bg-white " >
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset("img/bright_logo_big.png")}}" alt="Bright Containers" class="img-responsive img-preview-sm h-100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item home">
                  <a class="nav-link" href="{{url('/home')}}">
                    Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item about-us">
                  <a class="nav-link" href="/about-us">
                    About us
                  </a>
                </li>
                <li class="nav-item dropdown product">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product Category
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($navCategory as $item)
                      <a class="dropdown-item" href="{{url('productCategory',['categoryData'=>$item])}}">{{$item['category_name']}}</a>
                    @endforeach
                  </div>
                </li>
                <li class="nav-item quality">
                    <a class="nav-link" href="/quality">
                      Quality
                    </a>
                </li>
                <li class="nav-item brochure">
                    <a class="nav-link" href="{{ url('brochure')}}">
                      Brochure
                    </a>
                </li>
                <li class="nav-item contact-us">
                    <a class="nav-link" href="/contact-us">
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
                <li class="nav-item dropdown"><a id="navbarDropdown" class="nav-link dropdown-toggle btn text-dark px-3 font-weight-bold"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{-- {{ Auth::user()->name }} --}}
                        <img src="{{asset('storage/Logo/'.Auth::user()->comp_logo)}}" alt="Company Logo" style="height: 40px;weight:auto; border-radius:100px">
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
