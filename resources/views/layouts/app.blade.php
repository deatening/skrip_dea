<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Matrix Admin Lite Free Versions Template by WrapPixel</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/assets/images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/dist/css/style.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5" >
            <nav class="navbar top-navbar navbar-dark" style="background-color: ;color: ;">
                <div class="navbar-header" data-logobg="skin5" style="background-color: ;color: ;">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon ps-2">
                            {{-- <img src="{{ asset('logo.jpeg') }}" alt="homepage"
                                class="light-logo" width="25" /> --}}
                                Puskesmas Long Hubung
                        </b>
                        <span class="logo-text ms-2">
                            {{-- <img src="{{ asset('asset/assets/images/logo-text.png') }}" alt="homepage"
                                class="light-logo" /> --}}
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto" style="background-color: ;color: ;"> 
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar" style="background-color: ;">
                <nav class="sidebar-nav" style="background-color: ;">
                    <ul id="sidebarnav" class="pt-4">

                        @if (Auth::user() == null)
                        @else
                            @if (Auth::user()->role == '1')
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home"
                                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                            class="hide-menu" style="color: ;">Petugas</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('petugas.perawat') }}" aria-expanded="false"><i
                                            class="mdi mdi-view-dashboard"></i><span
                                            class="hide-menu" style="color: ;">Perawat</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('petugas.dokter') }}" aria-expanded="false"><i
                                            class="mdi mdi-view-dashboard" style="color: ;"></i><span class="hide-menu">Dokter</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('petugas.pasien') }}" aria-expanded="false"><i
                                            class="mdi mdi-view-dashboard" style="color: ;"></i><span class="hide-menu">Pasien</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('petugas.laporan_ctt_p') }}" aria-expanded="false"><i
                                            class="mdi mdi-view-dashboard"></i><span class="hide-menu" style="color: ;">Laporan Riwayat Rawat</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('petugas.laporan_ctt_per') }}" aria-expanded="false"><i
                                            class="mdi mdi-view-dashboard"></i><span class="hide-menu" style="color: ;">Laporan Riwayat Kebidanan</span></a>
                                </li>
                            @elseif(Auth::user()->role == '2')
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home"
                                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                            class="hide-menu" style="color: ;">Perawat</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('perawat.ctt_perawat') }}" aria-expanded="false"><i
                                            class="mdi mdi-view-dashboard" style="color: ;"></i><span class="hide-menu">Catatan
                                            Perawat</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="{{ route('perawat.ctt_persalinan') }}" aria-expanded="false"><i
                                            class="mdi mdi-view-dashboard" style="color: ;"></i><span class="hide-menu">Catatan
                                            Persalinan</span></a>
                                </li>
                            @elseif(Auth::user()->role == '3')
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home"
                                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                            class="hide-menu" style="color: ;">{{Auth::user()->bidang}}</span></a>
                                </li>
                                @if(Auth::user()->bidang == "Bidan")
                                    <li class="sidebar-item">
                                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dokter.asuhan') }}"
                                            aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                                class="hide-menu" style="color: ;">Catatan Persalinan</span></a>
                                    </li>
                                @else
                                    <li class="sidebar-item">
                                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{ route('dokter.rawat') }}" aria-expanded="false"><i
                                                class="mdi mdi-view-dashboard"></i><span class="hide-menu" style="color: ;">Catatan
                                                Dokter</span></a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dokter.rawat.jenis') }}"
                                            aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                                class="hide-menu" style="color: ;">Data Rawat</span></a>
                                    </li>
                                @endif
                               
                                
                            @endif
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"
                                    aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                        class="hide-menu" style="color: ;">Log Out</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by Dea
            </footer>
        </div>
    </div>
    <script src="{{ asset('asset/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('asset/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('asset/dist/js/waves.js') }}"></script>
    <script src="{{ asset('asset/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('asset/dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('asset/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('asset/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('asset/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        $("#zero_config").DataTable();
    </script>
</body>

</html>
