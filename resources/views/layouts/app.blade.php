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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="navbar-brand d-flex align-items-center justify-content-center"
                                href="{{ url('/') }}">
                                <img src="{{ Vite::asset('resources/images/logokejaksaan.png') }}" alt=""
                                    style="height:40px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand d-flex align-items-center justify-content-center"
                                href="{{ url('/') }}">
                                <b class="text-wrap text-center"> Pemetaan Satuan Kerja Kejaksaan Tinggi Jawa Timur</b>
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto navbar-dark bg-dark">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item d-flex justify-content-center">
                                    <a id="anchorLogin" class="btn btn-light"
                                        href="{{ route('login') }}">{{ __('Login Admin') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown ">
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
    <script>
        // hide login link while below 768px width viewport
        function checkViewportWidth() {
            var element = document.getElementById("anchorLogin");
            console.log("Viewport width: " + window.innerWidth);
            if (window.innerWidth < 768) {
                // adding class to the element with anchorLogin id to add class d-none since this project use bootstrap so the style must be done via class because bootstrap value will be the priorities than pure css value
                element.classList.add("d-none");
            } else {
                element.classList.remove("d-none") // Or any other desired display value
            }
        }

        // Initial check when the page loads
        checkViewportWidth();

        // Attach an event listener to check whenever the viewport is resized
        window.addEventListener("resize", checkViewportWidth);
    </script>
</body>

</html>
