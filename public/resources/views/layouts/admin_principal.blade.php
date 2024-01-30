<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>SI@DI | ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistema Si@di" name="description" />
    <meta content="ITV" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/dashboard/assets/images/logo_idiomas.png') }}">

    <!-- jquery.vectormap css -->
    <link
        href="{{ asset('assets/dashboard/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link rel="stylesheet" href="{{ asset('assets/alertas/sweetalert2.min.css') }}">
    <link href="{{ asset('assets/dashboard/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .input-disabled {
            background-color: #AEB4A9;
            /* Color de fondo personalizado */

        }
    </style>
    @stack('style-custom.css')

    @livewireStyles
    @livewireScripts
    @vite(['resources/js/app.js'])
</head>

<body data-layout="detached" data-topbar="colored">



    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">


            @include('layouts.header')
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div class="h-100">

                    <div class="user-wid text-center py-4">
                        <div class="user-img">
                            <img src="{{ asset('assets/dashboard/assets/images/upea2.png') }}" alt=""
                                class="avatar-md mx-auto rounded-circle">
                        </div>

                        <div class="mt-3">

                            <a class="text-reset fw-medium font-size-16"> {{ Auth::user()->name }}
                                {{ Auth::user()->paterno }} {{ Auth::user()->materno }}</a>
                            <p class="text-muted mt-1 mb-0 font-size-13"> {{ Auth::user()->roles[0]->name }} </p>

                        </div>
                    </div>

                    <!--- Sidemenu -->
                    @include('layouts.slider')
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    @yield('body')

                    <!-- start page title -->



                    <!-- end row -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © By Navi.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Universidad Pública de El Alto
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    </div>
    <!-- end container-fluid -->

    <!-- Right Sidebar -->

    <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body rightbar">
            <div class="right-bar">
                <div data-simplebar class="h-100">
                    <div class="rightbar-title px-3 py-4">
                        <a href="javascript:void(0);" class="right-bar-toggle float-end" data-bs-dismiss="offcanvas"
                            aria-label="Close">
                            <i class="mdi mdi-close noti-icon"></i>
                        </a>
                        <h5 class="m-0">Configuracion Tema</h5>
                    </div>

                    <!-- Settings -->
                    <hr class="mt-0" />
                    <h6 class="text-center mb-0">Temas</h6>

                    <div class="p-4">
                        <div class="mb-2">
                            <img src="{{ asset('assets/dashboard/assets/images/layouts/layout-1.jpg') }}"
                                class="img-fluid img-thumbnail" alt="">
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch"
                                checked />
                            <label class="form-check-label" for="light-mode-switch">Modo Ligero</label>
                        </div>

                        <div class="mb-2">
                            <img src="{{ asset('assets/dashboard/assets/images/layouts/layout-2.jpg') }}"
                                class="img-fluid img-thumbnail" alt="">
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" />
                            <label class="form-check-label" for="dark-mode-switch">Modo Oscuro</label>
                        </div>

                        <div class="mb-2">
                            <img src="{{ asset('assets/dashboard/assets/images/layouts/layout-3.jpg') }}"
                                class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="form-check form-switch mb-5">
                            <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                                data-appStyle="assets/css/app-rtl.min.css" />
                            <label class="form-check-label" for="rtl-mode-switch">Modo RTL</label>
                        </div>

                    </div>

                </div>
                <!-- end slimscroll-menu-->
            </div>
        </div>

    </div>


    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- apexcharts -->
    <!-- <script src="{{ asset('assets/dashboard/assets/libs/apexcharts/apexcharts.min.js') }}"></script> -->
    <script src="{{ asset('assets/libs/apexcharts-bundle/dist/apexcharts.min.js') }}"></script>

    <!-- jquery.vectormap map -->
    <script
        src="{{ asset('assets/dashboard/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/dashboard/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}">
    </script>

   <!--  <script src="{{ asset('assets/dashboard/assets/js/pages/dashboard.init.js') }}"></script> -->

    <script src="{{ asset('assets/dashboard/assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/alertas/sweetalert2.all.min.js') }}"></script>
    <script>
        Livewire.on('alert', function(message) {
            Swal.fire(
                'Guardado con exito!',
                message,
                'success'
            )
        })
        Livewire.on('errorvalidate', function(message) {
            Swal.fire(
                'Error!',
                message,
                'error'
            )
        })
        Livewire.on('vacio', function(message) {
            Swal.fire(
                'Asignatura vacio',
                message,
                'error'
            )
        })
    </script>


    @stack('navi-js')

</body>

</html>
