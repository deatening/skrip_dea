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

<body style="background-color: antiquewhite">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon ps-2">
                        </b>
                        <span class="logo-text ms-2">
                            {{-- <img src="{{ asset('asset/assets/images/logo-text.png') }}" alt="homepage"
                                class="light-logo" /> --}}
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                
            </nav>
        </header>
       <br>
       <br>
       <br>
       <br>
        <div class="page">
            <div class="container-fluid">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Login') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                      

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
