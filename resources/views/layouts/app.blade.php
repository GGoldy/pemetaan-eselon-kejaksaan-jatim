<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (isset($pageTitle))
        <title>{{ $pageTitle }}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif


    {{-- css import by unique page --}}
    @yield('importsinhead')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Import vite JS, SCSS, and CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Styling CSS Internal --}}
    <style>
        @media (max-width: 768px) {
            * {
                font-size: 2vw;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container justify-content-start justify-content-md-between w-100">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- item non collapsable --}}
                <ul class="navbar-nav" style="width: 93%">
                    <li class="nav-item d-grid w-100">
                        <div class="row d-flex align-items-center">
                            <a class="navbar-brand col-2 col-md-1 mx-0 px-0 py-0 d-flex justify-content-center"
                                href="{{ url('/') }}">
                                <img class="" src="{{ Vite::asset('resources/images/logokejaksaan.png') }}"
                                    alt="Logo Kejaksaan Tinggi Jawa Timur" style="height:40px;">
                            </a>
                            <a class="navbar-brand col-9 col-md-10 mx-0 px-0 py-0" href="{{ url('/') }}">
                                <b class="text-wrap text-center"> Pemetaan Satuan Kerja Kejaksaan Tinggi Jawa Timur</b>
                            </a>
                        </div>
                    </li>
                </ul>

                {{-- items collapsable --}}
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto navbar-dark bg-dark">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item d-flex justify-content-center">
                                    <a id="anchorLogin" class="btn btn-light text-nowrap"
                                        href="{{ route('login') }}">{{ __('Login Admin') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown d-flex flex-column align-items-center justify-content-center">
                                <a id="navbarDropdown" class="dropdown-toggle btn btn-light" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end navbar-dark bg-dark "
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin') }}" style="color:white;"
                                        onmouseover="this.style.color='black';" onmouseout="this.style.color='white';"><i
                                            class="bi bi-house me-1"></i>{{ __('Dasbor Admin') }}</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        style="color:white;" onmouseover="this.style.color='black';"
                                        onmouseout="this.style.color='white';"><i class="bi bi-box-arrow-right"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </div>

        </nav>

        <main class="">
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
</body>

</html>
