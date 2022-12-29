<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EatClean') }}</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }} ">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }} ">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }} ">


    <link rel="stylesheet" href="{{ asset('admin/images/favicon.png') }} ">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <header>
        <nav>
            <div class="nav-bar">
                <div class="nav-bar__logo">
                    <a href="{{ url('/') }}">
                        Eatclean
                    </a>
                </div>

                <ul class="nav-bar__link">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>

                    <li><a href="#">About us</a></li>
                    <li>
                        <a href="{{ url('collections') }}">Menu</a>
                    </li>

                    <li><a href="#">News</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <div class="nav-bar__icon">

                    <ul class="nav justify-content-end">
                        <h5 class="font-weight-bold">
                            <li class="nav-item text-dark">
                                <a class="nav-link text-dark" href="{{ url('showcart') }}">
                                    <i class="fa fa-shopping-cart"></i> Cart
                                </a>
                            </li>
                        </h5>

                        @guest
                            @if (Route::has('login'))
                                <h5 class="font-weight-bold">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                </h5>
                            @endif


                            @if (Route::has('register'))
                                <h5 class="font-weight-bold">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                </h5>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark " href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user text-dark"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>

        </nav>
    </header>

    <script src="function.js"></script>
    <script src="navbar_funcion.js"></script>

</body>
