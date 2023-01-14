<!--header-->
<link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<style>
    .rounded-circle{
    border-radius: 50%!important;
    }
    .img-profile{
    height: 2rem;
    width: 2rem;
    margin: 6px;
    }
    .uname{
        border-left: 2px solid #151B1D;
        padding: 4px;
    }
    .uname:hover{
        color:#FF1654;
    }
</style>
<header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg stroke">
        <h1><a class="navbar-brand mr-lg-5" href="{{route('home')}}">
            Ghumgham<sub style="font-size: 15pt">.com</sub>
          </a></h1>
        <!-- if logo is image enable this
      <a class="navbar-brand" href="#index.html">
          <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto">
            @if (empty(Auth::user()->id))
                <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
             @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
             @endif

            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('packages')}}">Tour Packages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('contact')}}">Contact</a>
            </li>
            @if (!empty(Auth::user()->id))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('booking.index')}}">Bookings</a>
                  </li>
            @endif
          </ul>
        </div>

        @if (empty(Auth::user()->id))
        <div class="d-lg-block d-none" style="margin-right:10px;">
          <a href="" data-toggle="modal" data-target="#LoginModal" class="btn btn-style btn-secondary">Login</a>
        </div>
        <div class="d-lg-block d-none">
            <a href="{{ route('register') }}" class="btn btn-style btn-secondary">Register</a>
          </div>
        @endif

        <!-- toggle switch for light and dark theme -->
        <div class="mobile-position">
          <nav class="navigation">
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>
        <!-- //toggle switch for light and dark theme -->
        @if (!empty(Auth::user()->id))
        <img class="img-profile rounded-circle"  src="{{asset('assets/images/user.png')}}">
        <div class="dropdown show">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="uname">{{ Auth::user()->name }}</span><i class="fas fa-duotone fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu shadow animated--grow-in" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{route('user.profile')}}"> <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
          </div>
          @endif
    </div>
    @if (session('session'))
        <div class="alert alert-danger">
            {{session('session')}}
        </div>
        @endif
      </nav>
  </header>
  <div>
  <!-- //header -->
  @if (empty(Auth::user()->id))
  <!-- login modal starts here-->
  <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <x-guest-layout>
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        {{-- <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif --}}
                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                    {{ __('Register Now') }}
                                </a>

                            <x-button class="ml-3">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
            </x-guest-layout>

        </div>
        @endif

        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
  <!-- login modal ends here-->

