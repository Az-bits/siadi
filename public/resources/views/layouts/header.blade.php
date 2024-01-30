<header id="page-topbar" style="background: #1488CC;  background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  background: linear-gradient(to right, #2B32B2, #1488CC); ">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-end">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="m-0">
                                <div class="input-group">
                                    <input type="text" qclass="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>

               

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('assets/dashboard/assets/images/upea2.png')}}"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1"> {{ Auth::user()->name }} </span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                            Perfil</a>
                       
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                     <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Salir</a>
                           
                        </form>
                      
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button  type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="mdi mdi-settings-outline"></i>
                    </button>
                </div>

            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('assets/dashboard/assets/images/logo_idiomas.png')}}" alt="" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/dashboard/assets/images/logo_idiomas.png')}}" alt="" height="17">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('assets/dashboard/assets/images/logo_idiomas.png')}}" alt="" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/dashboard/assets/images/logo_idiomas.png')}}" alt="" height="19">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                    id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
             

               
            </div>

        </div>
    </div>
</header> <!-- ========== Left Sidebar Start ========== -->