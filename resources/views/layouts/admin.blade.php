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
    @yield('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet" /> --}}
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    @stack('style-alt')
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <!-- Sidebar Toggle -->
        <!-- Navbar Toggle -->
        <button class="btn btn-link btn-sm order-1 order-lg-0 mx-1 px-4 me-lg-0" id="sidebarToggle"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Brand -->
        <b><a class="navbar-brand px-3" href="{{ route('admin') }}">Satuan Kerja Kejati Jatim</a></b>

        <!-- ... your navigation menu ... -->

        <!-- Navbar Search -->

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
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-info-circle-fill"></i></div>
                            Pengenalan Aplikasi
                        </a>
                        <div class="sb-sidenav-menu-heading">Alat</div>
                        <a class="nav-link" href="{{ route('leaflet') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-geo-alt"></i></div>
                            Peta
                        </a>
                        <a class="nav-link" href="{{ route('satkers.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-table"></i></div>
                            Admin Satker KEJATI JATIM
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Kejaksaan Tinggi Jawa Timur 2023</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>


    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</body>

</html>
