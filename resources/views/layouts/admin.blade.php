@php
    $currentRouteName = Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }}</title>
    @yield('importsinhead')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts Vite -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])

    <!-- for datatables ajax googleapis-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- sweet alert import for js functionality inside view -->
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>


</head>

<body class="sb-nav-fixed">
    <!-- including sweet alert to use with facades in controller -->
    @include('sweetalert::alert')

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark shadow-sm">
        <!-- Sidebar Toggle -->
        <!-- Navbar Toggle -->
        <button class="btn btn-link btn-sm order-0 order-lg-0 mx-1 px-4 me-lg-0" id="sidebarToggle"><i
                class="bi bi-list fs-3"></i></button>
        <!-- Navbar Brand -->
        <a class="navbar-brand px-3" href="{{ route('admin') }}"><img class="me-1"
                src="{{ Vite::asset('resources/images/logokejaksaan.png') }}" alt="" style="height:40px;">
            <b>Pemetaan Satuan Kerja Kejaksaan Tinggi Jawa Timur</b>
        </a>

        <!-- ... navigation menu ... -->
        <!-- Navbar Dropdown -->
        <div class="dropdown ms-auto me-3 me-lg-4">
            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-in-left"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Dasbor</div>

                        <a class="nav-link @if ($currentRouteName == 'peta' or $currentRouteName == 'admin') active @endif" href="{{ route('peta') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-geo-alt"></i></i></div>
                            Peta
                        </a>
                        <div class="sb-sidenav-menu-heading">Alat</div>

                        <a class="nav-link @if ($currentRouteName == 'satkers.index') active @endif"
                            href="{{ route('satkers.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                            Tabel Satuan Kerja
                        </a>
                        <a class="nav-link @if ($currentRouteName == 'jabatans.index') active @endif"
                            href="{{ route('jabatans.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                            Tabel Jabatan
                        </a>
                        <a class="nav-link @if ($currentRouteName == 'jumlahs.index') active @endif"
                            href="{{ route('jumlahs.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-table"></i></div>
                            Tabel Jumlah Pegawai
                        </a>
                        <div class="sb-sidenav-menu-heading">Pranala</div>
                        <a class="nav-link" href="{{ route('home') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-arrow-up-right-circle"></i></div>
                            Beranda Pengunjung
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Unauthorized User
                    @endauth
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
    </div>
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>

</html>
