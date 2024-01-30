<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI@DI</title>
    <link rel="stylesheet" href="{{ asset('assets/risebothtml/app/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/risebothtml/app/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/risebothtml/app/dist/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/risebothtml/assets/font/font-awesome.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{$intitucion->intitucion_url_logo }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/risebothtml/assets/images/favicon.png') }}">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/risebothtml/app/dist/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/risebothtml/assets/font/risebot.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/alertas/sweetalert2.min.css') }}">
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @livewireStyles
    @livewireScripts
</head>

<body class="header-fixed main home1 counter-scroll">
    <!-- preloade -->
    <div class="preloader">
        <div class="clear-loading loading-effect-2">
            <span></span>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header_main" class="header">
            <div class="container">
                <div id="site-header-inner">
                    <div class="header__logo">
                        <a href="index.html"><img src="{{ $intitucion->intitucion_url_logo }}"
                                alt=""></a>
                    </div>
                    <nav id="main-nav" class="main-nav">
                        <ul id="menu-primary-menu" class="menu">
                            <li class="menu-item menu-item-has-children  current-menu-item">
                                <a href="/">INICIO</a>
                                <ul class="sub-menu">
                                    <li class="menu-item "><a href="#">SOBRE NOSOTROS</a></li>
                                    <li class="menu-item"><a href="#">CONTACTO</a></li>
                                   
                                </ul>
                            </li>
                            {{-- <li class="menu-item menu-item-has-children">
                                <a href="#">Project</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="project-grid.html">Project 01</a></li>
                                    <li class="menu-item"><a href="project-grid-2.html">Project 02</a></li>
                                    <li class="menu-item"><a href="project-grid-3.html">Project 03</a></li>
                                    <li class="menu-item"><a href="project-grid-4.html">Project 04</a></li>
                                    <li class="menu-item"><a href="project-grid-5.html">Project 05</a></li>
                                    <li class="menu-item"><a href="project-list.html">Project List</a></li>
                                    <li class="menu-item"><a href="project-details.html">Project Details</a></li>
                                    <li class="menu-item"><a href="submit-project.html">Submit Project</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#">Page</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="token.html">Token</a></li>
                                    <li class="menu-item"><a href="connect-wallet.html">Connect Wallet</a></li>
                                    <li class="menu-item"><a href="team-details.html">Team Details</a></li>
                                    <li class="menu-item"><a href="submit-IGO-on-chain.html">Submit IGO on chain</a>
                                    </li>
                                    <li class="menu-item"><a href="faq.html">FAQs</a></li>
                                    <li class="menu-item"><a href="login.html">Login</a></li>
                                    <li class="menu-item"><a href="register.html">Register</a></li>
                                    <li class="menu-item"><a href="forget-password.html">Forget Password</a></li>
                                </ul>
                            </li>
                            <li class="menu-item ">
                                <a href="roadmap.html">Roadmap</a>
                            </li>

                            <li class="menu-item menu-item-has-children">
                                <a href="#">Blog</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="blog-grid.html">Blog Grid</a></li>
                                    <li class="menu-item"><a href="blog-list.html">Blog List</a></li>
                                    <li class="menu-item"><a href="blog-details.html">Blog Detail</a></li>
                                </ul>
                            </li>
                            <li class="menu-item ">
                                <a href="contact.html">Contact</a>
                            </li> --}}
                            <li class="menu-item ">
                                <a data-bs-toggle="tab" data-bs-target="#convocatorias" type="button" role="tab" aria-controls="convocatorias" id="convocatorias-tab">CONVOCATORIASssafsfsdfsdfsdsdfdsfsfsdfdssdfdsfdsfssdfsd</a>
                            </li>
                              <li class="menu-item ">
                                <a data-bs-toggle="tab" data-bs-target="#comunicados" type="button" role="tab" aria-controls="comunicados" id="comunicados-tab">ffdfdf</a>
                            </li>
                              <li class="menu-item ">
                                <a href="https://www.upea.bo/">UPEA</a>
                            </li>
                        </ul>
                    </nav><!-- /#main-nav -->
                    <a href="#" data-toggle="modal" data-target="#loginmodal" class="tf-button style1">
                        ACCEDER
                    </a>
                  
                    <div class="mobile-button"><span></span></div><!-- /.mobile-button -->
                </div>
            </div>
        </header>


        @yield('body-page')
        {{-- <section class="page-title">
        <div class="icon_bg">
            <img src="{{asset('assets/risebothtml/assets/images/backgroup/bg_inner_slider.png')}}" alt="">
        </div>
        <div class="swiper-container slider-main">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slider-st1">
                        <div class="overlay">
                            <img src="{{asset('assets/risebothtml/assets/images//backgroup/bg-slider.png')}}" alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-slider">
                                        <div class="content-box">
                                            <h1 class="title" >Enter the gateway of Blockchain Gaming</h1>
                                            <p class="sub-title">Visually and spatially connecting games in a seamless metaverse experience</p>
                                            <div class="wrap-btn">
                                                <a href="project-list.html" class="tf-button style2">
                                                    EXPLORE IGO
                                                </a>
                                            </div>
                                        </div>
                                        <div class="image">
                                            <img class="img_main" src="{{asset('assets/risebothtml/assets/images/slider/Furore.png')}}" alt="">
                                            <div class="icon icon1">
                                                <img src="{{asset('assets/risebothtml/assets//images//slider/icon_1.png')}}" alt="">
                                            </div>
                                            <div class="icon icon2">
                                                <img src="{{asset('assets/risebothtml/assets//images//slider/icon_2.png')}}" alt="">
                                            </div>
                                            <div class="icon icon3">
                                                <img src="{{asset('assets/risebothtml/assets//images//slider/icon_3.png')}}" alt="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-st1">
                        <div class="overlay">
                            <img src="{{asset('assets/risebothtml/assets/images//backgroup/bg-slider.png')}}" alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-slider">
                                        <div class="content-box">
                                            <h1 class="title">Enter the gateway of Blockchain Gaming</h1>
                                            <p class="sub-title">Visually and spatially connecting games in a seamless metaverse experience</p>
                                            <div class="wrap-btn">
                                                <a href="#" class="tf-button style2">
                                                    EXPLORE IGO
                                                </a>
                                            </div>
                                        </div>
                                        <div class="image">
                                            <img class="img_main" src="{{asset('assets/risebothtml/assets/images/slider/Furore.png')}}" alt="">
                                            <div class="icon icon1">
                                                <img src="{{asset('assets/risebothtml/assets//images//slider/icon_1.png')}}" alt="">
                                            </div>
                                            <div class="icon icon2">
                                                <img src="{{asset('assets/risebothtml/assets//images//slider/icon_2.png')}}" alt="">
                                            </div>
                                            <div class="icon icon3">
                                                <img src="{{asset('assets/risebothtml/assets//images//slider/icon_3.png')}}" alt="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="btn-next-main"><i class="far fa-angle-right"></i></div>
            <div class="btn-prev-main"><i class="far fa-angle-left"></i></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="tf-section project">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tf-title" data-aos="fade-up" data-aos-duration="800">
                        <h2 class="title">
                            Featured iGO projects <br class="show-destop"> coming soon
                        </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-wrapper">
                        <div class="image-wrapper" data-aos="fade-in" data-aos-duration="1000">
                            <div class="swiper-container slider-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="./assets/images/slider/img_slider_1.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./assets/images/slider/img_slider_1.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./assets/images/slider/img_slider_1.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./assets/images/slider/img_slider_1.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./assets/images/slider/img_slider_1.jpg" alt="">
                                    </div>

                                </div>
                                <div class="swiper-pagination bottom_0"></div>

                            </div>
                        </div>
                        <div class="content-wrapper">
                            <div class="content_inner" data-aos="fade-left" data-aos-duration="1200">
                                <div class="wrapper">
                                    <h4>Codyfight IGO</h4>
                                <p class="desc">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent varius risus sed pellentesque
                                </p>
                                <ul class="price"> 
                                    <li>
                                        <span>Price: $0.4</span>
                                    </li>
                                    <li>
                                       <span>Total sales: $4720</span>
                                    </li>
                                </ul>
                                <h6 class="featured_title">Sale end in</h6>
                                <div class="featured-countdown">
                                    <span class="slogan"></span>
                                    <span class="js-countdown" data-timer="1865550"></span>
                                    <ul class="desc">
                                        <li>day</li>
                                        <li>hou</li>
                                        <li>min</li>
                                        <li>sec</li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf-section project_2">
        <div class="overlay">
            <img src="./assets/images/backgroup/bg_project.png" alt="">
        </div>
        <div class="container w_1690">
            <div class="row">
                <div class="col-md-12">
                    <div class="tf-title" data-aos="fade-up" data-aos-duration="800">
                        <h2 class="title">
                            Projects that promise a lot <br class="show-destop"> of potential
                        </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="container_inner">
                        <div class="swiper-container slider-2" data-aos="fade-in" data-aos-duration="1000">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="project-box">
                                        <div class="image">
                                            <img class="mask" src="./assets/images/common/project_1.png" alt="">
                                            <div class="shape">
                                                <img src="./assets/images/common/shape.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="boder"></span>
                                            <div class="content-inner">
                                                <h5 class="heading"><a href="./project-list.html">Zombie plant 2</a></h5>
                                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Praesent varius risus sed pellentesque</p>
                                                <ul>
                                                    <li>
                                                        <p class="text">Total raise:</p>
                                                        <p class="price">100K</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Valuation:</p>
                                                        <p class="price">23M</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Base allo:</p>
                                                        <p class="price">$0</p>
                                                    </li>
                                                </ul>
                                                <p class="social_title">Social</p>
                                                <ul class="social">
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3362 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33263 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19312 6.899 1.48225 6.68863 0.88 6.35725C0.88 6.371 0.88 6.38887 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9387 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0517C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36563 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09163 22 2.17863Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_207)">
                                                                <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                                <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_217)">
                                                                <path d="M11 1.46655C8.16933 1.46655 5.86667 3.76922 5.86667 6.59989V15.3999C5.86667 15.8032 5.53813 16.1332 5.13333 16.1332C4.72853 16.1332 4.4 15.8032 4.4 15.3999V11.7332H0V15.3999C0 18.2306 2.30267 20.5332 5.13333 20.5332C7.964 20.5332 10.2667 18.2306 10.2667 15.3999V6.59989C10.2667 6.19509 10.5952 5.86655 11 5.86655C11.4048 5.86655 11.7333 6.19509 11.7333 6.59989V9.38509L13.9333 10.8518L16.1333 9.38509V6.59989C16.1333 3.76922 13.8307 1.46655 11 1.46655Z" fill="#798DA3"/>
                                                                <path d="M17.6001 11.7331V15.3998C17.6001 15.8031 17.2701 16.1331 16.8667 16.1331C16.4634 16.1331 16.1334 15.8031 16.1334 15.3998V11.1479L14.3397 12.3433C14.2165 12.4254 14.0757 12.4665 13.9334 12.4665C13.7911 12.4665 13.6503 12.4254 13.5271 12.3433L11.7334 11.1479V15.3998C11.7334 18.2305 14.0361 20.5331 16.8667 20.5331C19.6974 20.5331 22.0001 18.2305 22.0001 15.3998V11.7331H17.6001Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.913 6.12039C13.913 4.56668 14.5094 3.75813 15.3516 3.75813C16.1537 3.75813 16.688 4.48388 16.688 5.95479C16.688 6.79181 16.4654 7.70902 16.3011 8.25108C16.3024 8.25237 17.1006 9.65601 19.2844 9.22522C19.7475 8.18769 19.9998 6.84355 19.9998 5.66501C19.9998 2.4942 18.3956 0.649414 15.4564 0.649414C12.433 0.649414 10.6659 2.99227 10.6659 6.08028C10.6659 9.13983 12.085 11.7673 14.424 12.964C13.4408 14.9472 12.1885 16.6949 10.8832 18.0119C8.51578 15.1244 6.37474 11.2744 5.49503 3.75942H1.99951C3.61402 16.2758 8.42522 20.2603 9.69691 21.0262C10.4162 21.4621 11.0372 21.4414 11.6943 21.0676C12.7267 20.4751 15.8289 17.3495 17.547 13.6871C18.2675 13.6845 19.1343 13.6017 19.9985 13.4038V10.9393C19.4694 11.0622 18.9584 11.1166 18.4978 11.1166C15.9066 11.1166 13.913 9.29249 13.913 6.12039Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4378 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1813 3.26 19.2651 3.28337 19.3325 3.24625L20.7144 2.51337C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56062 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14088 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7482 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60288 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40437 10.7731 5.08188L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        
                                        </div>
                                        <a href="project-list.html" class="tf-button style1">
                                            EXPLORE
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project-box">
                                        <div class="image">
                                            <img class="mask" src="./assets/images/common/project_2.png" alt="">
                                            <div class="shape">
                                                <img src="./assets/images/common/shape.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="boder"></span>
                                            <div class="content-inner">
                                                <h5 class="heading"><a href="project-list.html">Zombie plant 2</a></h5>
                                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Praesent varius risus sed pellentesque</p>
                                                <ul>
                                                    <li>
                                                        <p class="text">Total raise:</p>
                                                        <p class="price">100K</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Valuation:</p>
                                                        <p class="price">23M</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Base allo:</p>
                                                        <p class="price">$0</p>
                                                    </li>
                                                </ul>
                                                <p class="social_title">Social</p>
                                                <ul class="social">
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3362 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33263 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19312 6.899 1.48225 6.68863 0.88 6.35725C0.88 6.371 0.88 6.38887 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9387 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0517C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36563 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09163 22 2.17863Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_207)">
                                                                <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                                <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_217)">
                                                                <path d="M11 1.46655C8.16933 1.46655 5.86667 3.76922 5.86667 6.59989V15.3999C5.86667 15.8032 5.53813 16.1332 5.13333 16.1332C4.72853 16.1332 4.4 15.8032 4.4 15.3999V11.7332H0V15.3999C0 18.2306 2.30267 20.5332 5.13333 20.5332C7.964 20.5332 10.2667 18.2306 10.2667 15.3999V6.59989C10.2667 6.19509 10.5952 5.86655 11 5.86655C11.4048 5.86655 11.7333 6.19509 11.7333 6.59989V9.38509L13.9333 10.8518L16.1333 9.38509V6.59989C16.1333 3.76922 13.8307 1.46655 11 1.46655Z" fill="#798DA3"/>
                                                                <path d="M17.6001 11.7331V15.3998C17.6001 15.8031 17.2701 16.1331 16.8667 16.1331C16.4634 16.1331 16.1334 15.8031 16.1334 15.3998V11.1479L14.3397 12.3433C14.2165 12.4254 14.0757 12.4665 13.9334 12.4665C13.7911 12.4665 13.6503 12.4254 13.5271 12.3433L11.7334 11.1479V15.3998C11.7334 18.2305 14.0361 20.5331 16.8667 20.5331C19.6974 20.5331 22.0001 18.2305 22.0001 15.3998V11.7331H17.6001Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.913 6.12039C13.913 4.56668 14.5094 3.75813 15.3516 3.75813C16.1537 3.75813 16.688 4.48388 16.688 5.95479C16.688 6.79181 16.4654 7.70902 16.3011 8.25108C16.3024 8.25237 17.1006 9.65601 19.2844 9.22522C19.7475 8.18769 19.9998 6.84355 19.9998 5.66501C19.9998 2.4942 18.3956 0.649414 15.4564 0.649414C12.433 0.649414 10.6659 2.99227 10.6659 6.08028C10.6659 9.13983 12.085 11.7673 14.424 12.964C13.4408 14.9472 12.1885 16.6949 10.8832 18.0119C8.51578 15.1244 6.37474 11.2744 5.49503 3.75942H1.99951C3.61402 16.2758 8.42522 20.2603 9.69691 21.0262C10.4162 21.4621 11.0372 21.4414 11.6943 21.0676C12.7267 20.4751 15.8289 17.3495 17.547 13.6871C18.2675 13.6845 19.1343 13.6017 19.9985 13.4038V10.9393C19.4694 11.0622 18.9584 11.1166 18.4978 11.1166C15.9066 11.1166 13.913 9.29249 13.913 6.12039Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4378 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1813 3.26 19.2651 3.28337 19.3325 3.24625L20.7144 2.51337C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56062 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14088 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7482 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60288 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40437 10.7731 5.08188L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        
                                        </div>
                                        <a href="project-list.html" class="tf-button style1">
                                            EXPLORE
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project-box">
                                        <div class="image">
                                            <img class="mask" src="./assets/images/common/project_3.png" alt="">
                                            <div class="shape">
                                                <img src="./assets/images/common/shape.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="boder"></span>
                                            <div class="content-inner">
                                                <h5 class="heading"><a href="project-list.html">Zombie plant 2</a></h5>
                                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Praesent varius risus sed pellentesque</p>
                                                <ul>
                                                    <li>
                                                        <p class="text">Total raise:</p>
                                                        <p class="price">100K</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Valuation:</p>
                                                        <p class="price">23M</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Base allo:</p>
                                                        <p class="price">$0</p>
                                                    </li>
                                                </ul>
                                                <p class="social_title">Social</p>
                                                <ul class="social">
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3362 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33263 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19312 6.899 1.48225 6.68863 0.88 6.35725C0.88 6.371 0.88 6.38887 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9387 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0517C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36563 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09163 22 2.17863Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_207)">
                                                                <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                                <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_217)">
                                                                <path d="M11 1.46655C8.16933 1.46655 5.86667 3.76922 5.86667 6.59989V15.3999C5.86667 15.8032 5.53813 16.1332 5.13333 16.1332C4.72853 16.1332 4.4 15.8032 4.4 15.3999V11.7332H0V15.3999C0 18.2306 2.30267 20.5332 5.13333 20.5332C7.964 20.5332 10.2667 18.2306 10.2667 15.3999V6.59989C10.2667 6.19509 10.5952 5.86655 11 5.86655C11.4048 5.86655 11.7333 6.19509 11.7333 6.59989V9.38509L13.9333 10.8518L16.1333 9.38509V6.59989C16.1333 3.76922 13.8307 1.46655 11 1.46655Z" fill="#798DA3"/>
                                                                <path d="M17.6001 11.7331V15.3998C17.6001 15.8031 17.2701 16.1331 16.8667 16.1331C16.4634 16.1331 16.1334 15.8031 16.1334 15.3998V11.1479L14.3397 12.3433C14.2165 12.4254 14.0757 12.4665 13.9334 12.4665C13.7911 12.4665 13.6503 12.4254 13.5271 12.3433L11.7334 11.1479V15.3998C11.7334 18.2305 14.0361 20.5331 16.8667 20.5331C19.6974 20.5331 22.0001 18.2305 22.0001 15.3998V11.7331H17.6001Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.913 6.12039C13.913 4.56668 14.5094 3.75813 15.3516 3.75813C16.1537 3.75813 16.688 4.48388 16.688 5.95479C16.688 6.79181 16.4654 7.70902 16.3011 8.25108C16.3024 8.25237 17.1006 9.65601 19.2844 9.22522C19.7475 8.18769 19.9998 6.84355 19.9998 5.66501C19.9998 2.4942 18.3956 0.649414 15.4564 0.649414C12.433 0.649414 10.6659 2.99227 10.6659 6.08028C10.6659 9.13983 12.085 11.7673 14.424 12.964C13.4408 14.9472 12.1885 16.6949 10.8832 18.0119C8.51578 15.1244 6.37474 11.2744 5.49503 3.75942H1.99951C3.61402 16.2758 8.42522 20.2603 9.69691 21.0262C10.4162 21.4621 11.0372 21.4414 11.6943 21.0676C12.7267 20.4751 15.8289 17.3495 17.547 13.6871C18.2675 13.6845 19.1343 13.6017 19.9985 13.4038V10.9393C19.4694 11.0622 18.9584 11.1166 18.4978 11.1166C15.9066 11.1166 13.913 9.29249 13.913 6.12039Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4378 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1813 3.26 19.2651 3.28337 19.3325 3.24625L20.7144 2.51337C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56062 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14088 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7482 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60288 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40437 10.7731 5.08188L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        
                                        </div>
                                        <a href="project-list.html" class="tf-button style1">
                                            EXPLORE
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project-box">
                                        <div class="image">
                                            <img class="mask" src="./assets/images/common/project_4.png" alt="">
                                            <div class="shape">
                                                <img src="./assets/images/common/shape.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="boder"></span>
                                            <div class="content-inner">
                                                <h5 class="heading"><a href="project-list.html">Iron Blade</a></h5>
                                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Praesent varius risus sed pellentesque</p>
                                                <ul>
                                                    <li>
                                                        <p class="text">Total raise:</p>
                                                        <p class="price">100K</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Valuation:</p>
                                                        <p class="price">23M</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Base allo:</p>
                                                        <p class="price">$0</p>
                                                    </li>
                                                </ul>
                                                <p class="social_title">Social</p>
                                                <ul class="social">
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3362 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33263 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19312 6.899 1.48225 6.68863 0.88 6.35725C0.88 6.371 0.88 6.38887 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9387 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0517C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36563 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09163 22 2.17863Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_207)">
                                                                <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                                <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_217)">
                                                                <path d="M11 1.46655C8.16933 1.46655 5.86667 3.76922 5.86667 6.59989V15.3999C5.86667 15.8032 5.53813 16.1332 5.13333 16.1332C4.72853 16.1332 4.4 15.8032 4.4 15.3999V11.7332H0V15.3999C0 18.2306 2.30267 20.5332 5.13333 20.5332C7.964 20.5332 10.2667 18.2306 10.2667 15.3999V6.59989C10.2667 6.19509 10.5952 5.86655 11 5.86655C11.4048 5.86655 11.7333 6.19509 11.7333 6.59989V9.38509L13.9333 10.8518L16.1333 9.38509V6.59989C16.1333 3.76922 13.8307 1.46655 11 1.46655Z" fill="#798DA3"/>
                                                                <path d="M17.6001 11.7331V15.3998C17.6001 15.8031 17.2701 16.1331 16.8667 16.1331C16.4634 16.1331 16.1334 15.8031 16.1334 15.3998V11.1479L14.3397 12.3433C14.2165 12.4254 14.0757 12.4665 13.9334 12.4665C13.7911 12.4665 13.6503 12.4254 13.5271 12.3433L11.7334 11.1479V15.3998C11.7334 18.2305 14.0361 20.5331 16.8667 20.5331C19.6974 20.5331 22.0001 18.2305 22.0001 15.3998V11.7331H17.6001Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.913 6.12039C13.913 4.56668 14.5094 3.75813 15.3516 3.75813C16.1537 3.75813 16.688 4.48388 16.688 5.95479C16.688 6.79181 16.4654 7.70902 16.3011 8.25108C16.3024 8.25237 17.1006 9.65601 19.2844 9.22522C19.7475 8.18769 19.9998 6.84355 19.9998 5.66501C19.9998 2.4942 18.3956 0.649414 15.4564 0.649414C12.433 0.649414 10.6659 2.99227 10.6659 6.08028C10.6659 9.13983 12.085 11.7673 14.424 12.964C13.4408 14.9472 12.1885 16.6949 10.8832 18.0119C8.51578 15.1244 6.37474 11.2744 5.49503 3.75942H1.99951C3.61402 16.2758 8.42522 20.2603 9.69691 21.0262C10.4162 21.4621 11.0372 21.4414 11.6943 21.0676C12.7267 20.4751 15.8289 17.3495 17.547 13.6871C18.2675 13.6845 19.1343 13.6017 19.9985 13.4038V10.9393C19.4694 11.0622 18.9584 11.1166 18.4978 11.1166C15.9066 11.1166 13.913 9.29249 13.913 6.12039Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4378 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1813 3.26 19.2651 3.28337 19.3325 3.24625L20.7144 2.51337C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56062 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14088 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7482 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60288 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40437 10.7731 5.08188L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        
                                        </div>
                                        <a href="project-list.html" class="tf-button style1">
                                            EXPLORE
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project-box">
                                        <div class="image">
                                            <img class="mask" src="./assets/images/common/project_1.png" alt="">
                                            <div class="shape">
                                                <img src="./assets/images/common/shape.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="boder"></span>
                                            <div class="content-inner">
                                                <h5 class="heading"><a href="project-list.html">Zombie plant 2</a></h5>
                                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Praesent varius risus sed pellentesque</p>
                                                <ul>
                                                    <li>
                                                        <p class="text">Total raise:</p>
                                                        <p class="price">100K</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Valuation:</p>
                                                        <p class="price">23M</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Base allo:</p>
                                                        <p class="price">$0</p>
                                                    </li>
                                                </ul>
                                                <p class="social_title">Social</p>
                                                <ul class="social">
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3362 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33263 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19312 6.899 1.48225 6.68863 0.88 6.35725C0.88 6.371 0.88 6.38887 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9387 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0517C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36563 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09163 22 2.17863Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_207)">
                                                                <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                                <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_1208_217)">
                                                                <path d="M11 1.46655C8.16933 1.46655 5.86667 3.76922 5.86667 6.59989V15.3999C5.86667 15.8032 5.53813 16.1332 5.13333 16.1332C4.72853 16.1332 4.4 15.8032 4.4 15.3999V11.7332H0V15.3999C0 18.2306 2.30267 20.5332 5.13333 20.5332C7.964 20.5332 10.2667 18.2306 10.2667 15.3999V6.59989C10.2667 6.19509 10.5952 5.86655 11 5.86655C11.4048 5.86655 11.7333 6.19509 11.7333 6.59989V9.38509L13.9333 10.8518L16.1333 9.38509V6.59989C16.1333 3.76922 13.8307 1.46655 11 1.46655Z" fill="#798DA3"/>
                                                                <path d="M17.6001 11.7331V15.3998C17.6001 15.8031 17.2701 16.1331 16.8667 16.1331C16.4634 16.1331 16.1334 15.8031 16.1334 15.3998V11.1479L14.3397 12.3433C14.2165 12.4254 14.0757 12.4665 13.9334 12.4665C13.7911 12.4665 13.6503 12.4254 13.5271 12.3433L11.7334 11.1479V15.3998C11.7334 18.2305 14.0361 20.5331 16.8667 20.5331C19.6974 20.5331 22.0001 18.2305 22.0001 15.3998V11.7331H17.6001Z" fill="#798DA3"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath>
                                                                <rect width="22" height="22" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.913 6.12039C13.913 4.56668 14.5094 3.75813 15.3516 3.75813C16.1537 3.75813 16.688 4.48388 16.688 5.95479C16.688 6.79181 16.4654 7.70902 16.3011 8.25108C16.3024 8.25237 17.1006 9.65601 19.2844 9.22522C19.7475 8.18769 19.9998 6.84355 19.9998 5.66501C19.9998 2.4942 18.3956 0.649414 15.4564 0.649414C12.433 0.649414 10.6659 2.99227 10.6659 6.08028C10.6659 9.13983 12.085 11.7673 14.424 12.964C13.4408 14.9472 12.1885 16.6949 10.8832 18.0119C8.51578 15.1244 6.37474 11.2744 5.49503 3.75942H1.99951C3.61402 16.2758 8.42522 20.2603 9.69691 21.0262C10.4162 21.4621 11.0372 21.4414 11.6943 21.0676C12.7267 20.4751 15.8289 17.3495 17.547 13.6871C18.2675 13.6845 19.1343 13.6017 19.9985 13.4038V10.9393C19.4694 11.0622 18.9584 11.1166 18.4978 11.1166C15.9066 11.1166 13.913 9.29249 13.913 6.12039Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4378 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1813 3.26 19.2651 3.28337 19.3325 3.24625L20.7144 2.51337C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56062 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14088 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7482 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60288 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40437 10.7731 5.08188L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                                </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        
                                        </div>
                                        <a href="project-list.html" class="tf-button style1">
                                            EXPLORE
                                        </a>
                                    </div>
                                </div>
                            </div>
               
                        </div>
                        <div class="next_slider-2 next_slider"><svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 8H16.5M16.5 8L9.75 1.25M16.5 8L9.75 14.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </div>
                        <div class="prev_slider-2 prev_slider"><svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5 8H1.5M1.5 8L8.25 1.25M1.5 8L8.25 14.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>

    <section class="tf-section project_3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tf-title" data-aos="fade-up" data-aos-duration="800">
                        <h2 class="title">
                            Easy to join IGO <br class="show-destop">  with 3 steps
                        </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-box-style2_wrapper">
                        <div class="project-box-style2" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                            <div class="image">
                                <img src="./assets/images/common/project_5.png" alt="">
                            </div>
                            <div class="content">
                                <h5>Submit KYC</h5>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at nunc non ligula suscipit tincidunt at sit amet nunc.</p>
                                <p class="number">01</p>
                            </div>
                            <a href="#" class="btn_project">
                                <img src="./assets/images/common/button_project.svg" alt="">
                            </a>
                        </div>
                        <div class="project-box-style2" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                            <div class="image">
                                <img src="./assets/images/common/project_6.png" alt="">
                            </div>
                            <div class="content">
                                <h5>Verify Wallet</h5>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at nunc non ligula suscipit tincidunt at sit amet nunc.</p>
                                <p class="number">02</p>
                            </div>
                            <a href="#" class="btn_project">
                                <img src="./assets/images/common/button_project.svg" alt="">
                            </a>
                        </div>
                        <div class="project-box-style2" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                            <div class="image">
                                <img src="./assets/images/common/project_7.png" alt="">
                            </div>
                            <div class="content">
                                <h5>Start Staking</h5>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at nunc non ligula suscipit tincidunt at sit amet nunc.</p>
                                <p class="number">03</p>
                            </div>
                            <a href="#" class="btn_project">
                                <img src="./assets/images/common/button_project.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf-section tf-token">
        <div class="overlay">
            <img src="./assets/images/backgroup/bg_project2.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tf-title" data-aos="fade-up" data-aos-duration="800">
                        <h2 class="title">
                            Statistics token
                        </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="counter_wrapper">
                            <div class="box">
                                <div class="image">
                                    <img src="./assets/images/common/counter_1.png" alt="">
                                </div>
                                <div class="content">
                                    <p class="desc">Funded Projects</p>
                                    <div class="box-couter counter">
                                        <div class="number-content">
                                            <span class="count-number" data-to="359" data-speed="2000" data-inviewport="yes">359</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="box">
                                <div class="image">
                                    <img src="./assets/images/common/counter_2.png" alt="">
                                </div>
                                <div class="content">
                                    <p class="desc">Unique Participants</p>
                                    <div class="box-couter counter">
                                        <div class="number-content">
                                            <span class="count-number" data-to="742" data-speed="2000" data-inviewport="yes">742</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="box">
                                <div class="image">
                                    <img src="./assets/images/common/counter_3.png" alt="">
                                </div>
                                <div class="content">
                                    <p class="desc">Raised Capital</p>
                                    <div class="box-couter counter">
                                        <div class="number-content">
                                            <span>$</span><span class="count-number" data-to="17" data-speed="2000" data-inviewport="yes">17</span><span>M</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="box">
                                <div class="image">
                                    <img src="./assets/images/common/counter_4.png" alt="">
                                </div>
                                <div class="content">
                                    <p class="desc">Initial Market Cap</p>
                                    <div class="box-couter counter">
                                        <div class="number-content">
                                            <span>$</span><span class="count-number" data-to="32" data-speed="2000" data-inviewport="yes">32</span><span>M</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="char_wrapper">
                            <ul class="describe_chart">
                                <li>
                                    <img src="./assets/images/chart/color_1.png" alt="">
                                    <div class="desc">
                                        <p class="name">Team</p>
                                        <p class="number">7.5%</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="./assets/images/chart/color_2.png" alt="">
                                    <div class="desc">
                                        <p class="name">Staking</p>
                                        <p class="number">9.5%</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="./assets/images/chart/color_3.png" alt="">
                                    <div class="desc">
                                        <p class="name">Advisors</p>
                                        <p class="number">10.0%</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="./assets/images/chart/color_4.png" alt="">
                                    <div class="desc">
                                        <p class="name">Liquidity</p>
                                        <p class="number">12.0%</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="./assets/images/chart/color_5.png" alt="">
                                    <div class="desc">
                                        <p class="name">Ecosystem</p>
                                        <p class="number">16.33%</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="./assets/images/chart/color_6.png" alt="">
                                    <div class="desc">
                                        <p class="name">Marketing</p>
                                        <p class="number">16.33%</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="./assets/images/chart/color_7.png" alt="">
                                    <div class="desc">
                                        <p class="name">Private Sale</p>
                                        <p class="number">30.0%</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="chart_inner" data-aos="fade-up" data-aos-duration="800">
                                <div class="content_inner">
                                    <img src="./assets//images/chart/subtract.png" alt="">
                                    <p>Statistics token</p>
                                </div>
                                <div id="container"></div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>

    <section class="tf-section project_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-9">
                    <div class="tf-title left" data-aos="fade-up" data-aos-duration="800">
                        <h2 class="title">
                            IGO projects have been excellently successful
                        </h2>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="wrap-btn" data-aos="fade-up" data-aos-duration="800">
                        <a href="project-list.html" class="tf-button style1">
                            All project
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="project-box-style3_wrapper">
                        <div class="project-box-style3" data-aos="fade-in" data-aos-duration="800">
                            <div class="header_project">
                                <div class="image">
                                    <img class="mask" src="./assets/images/common/project_8.png" alt="">
                                    <div class="shape">
                                        <img src="./assets/images/common/shape_2.png" alt="">
                                    </div>
                                </div>
                                <h5 class="heading"><a href="project-list.html">Zombie plant 2</a></h5>
                            </div>
                            <div class="content">
                                <div class="td td1">
                                    <p>Total raise</p>
                                    <p >$3970</p>
                                </div>
                                <div class="td td2">
                                    <p>Price</p>
                                    <p >0.05 USDT</p>
                                </div>
                                <div class="td td3">
                                    <p>Chain</p>
                                    <p ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" rx="12" fill="#414B57"/>
                                        <path d="M17.3047 14.0836L12.5508 20.1957C12.486 20.2807 12.4027 20.3499 12.3073 20.398C12.2119 20.4462 12.1069 20.4721 12 20.4738V15.8375L16.8876 13.5595C16.9577 13.5262 17.0371 13.5176 17.1127 13.5351C17.1883 13.5526 17.2558 13.5952 17.3042 13.656C17.3525 13.7167 17.3789 13.792 17.379 13.8697C17.3791 13.9473 17.3529 14.0227 17.3047 14.0836Z" fill="white"/>
                                        <path d="M12.0001 15.8375V20.4738C11.8932 20.4721 11.7881 20.4462 11.6927 20.398C11.5973 20.3499 11.5141 20.2807 11.4493 20.1957L6.69539 14.0836C6.64719 14.0227 6.621 13.9473 6.62109 13.8697C6.62119 13.792 6.64755 13.7167 6.69591 13.656C6.74426 13.5952 6.81174 13.5526 6.88739 13.5351C6.96303 13.5176 7.04237 13.5262 7.1125 13.5595L12.0001 15.8375Z" fill="white"/>
                                        <path d="M11.9997 10.0929V14.7452C11.9347 14.747 11.8703 14.7323 11.8125 14.7024L6.63617 12.1998C6.57754 12.17 6.52611 12.1278 6.48548 12.076C6.44484 12.0243 6.41597 11.9644 6.40088 11.9003L11.9997 10.0929Z" fill="white"/>
                                        <path d="M12 3.52625V10.0929L6.40122 11.9004C6.38429 11.8382 6.38077 11.7732 6.39092 11.7096C6.40106 11.6459 6.42462 11.5852 6.46004 11.5314L11.4278 3.84709C11.4877 3.74905 11.5718 3.66804 11.672 3.61186C11.7722 3.55567 11.8851 3.52619 12 3.52625Z" fill="white"/>
                                        <path d="M17.5988 11.9004L12 10.0929V3.52625C12.1149 3.52619 12.2278 3.55567 12.328 3.61186C12.4282 3.66804 12.5123 3.74905 12.5722 3.84709L17.54 11.5314C17.5754 11.5852 17.599 11.6459 17.6091 11.7096C17.6192 11.7732 17.6157 11.8382 17.5988 11.9004Z" fill="white"/>
                                        <path d="M17.5988 11.9003C17.5837 11.9644 17.5548 12.0243 17.5142 12.076C17.4736 12.1278 17.4221 12.17 17.3635 12.1998L12.1872 14.7024C12.1294 14.7323 12.065 14.747 12 14.7452V10.0929L17.5988 11.9003Z" fill="white"/>
                                        </svg>
                                    </p>
                                </div>
                                <div class="td td4">
                                    <p>Next claim in</p>
                                    <div class="featured-countdown style3">
                                        <span class="slogan"></span>
                                        <span class="js-countdown" data-timer="1865550"></span> 
                                    </div>
                                </div>
                                <div class="td td5">
                                    <ul class="social">
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3363 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33262 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19313 6.899 1.48225 6.68862 0.88 6.35725C0.88 6.371 0.88 6.38888 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9388 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0518C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36562 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09162 22 2.17863Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                    <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 0.466675C8.16933 0.466675 5.86667 2.76934 5.86667 5.60001V14.4C5.86667 14.8033 5.53813 15.1333 5.13333 15.1333C4.72853 15.1333 4.4 14.8033 4.4 14.4V10.7333H0V14.4C0 17.2307 2.30267 19.5333 5.13333 19.5333C7.964 19.5333 10.2667 17.2307 10.2667 14.4V5.60001C10.2667 5.19521 10.5952 4.86667 11 4.86667C11.4048 4.86667 11.7333 5.19521 11.7333 5.60001V8.38521L13.9333 9.85188L16.1333 8.38521V5.60001C16.1333 2.76934 13.8307 0.466675 11 0.466675Z" fill="#798DA3"/>
                                                    <path d="M17.6001 10.7334V14.4001C17.6001 14.8034 17.2701 15.1334 16.8667 15.1334C16.4634 15.1334 16.1334 14.8034 16.1334 14.4001V10.1482L14.3397 11.3435C14.2165 11.4257 14.0757 11.4667 13.9334 11.4667C13.7911 11.4667 13.6503 11.4257 13.5271 11.3435L11.7334 10.1482V14.4001C11.7334 17.2307 14.0361 19.5334 16.8667 19.5334C19.6974 19.5334 22.0001 17.2307 22.0001 14.4001V10.7334H17.6001Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.913 6.12039C11.913 4.56668 12.5094 3.75813 13.3516 3.75813C14.1537 3.75813 14.688 4.48388 14.688 5.95479C14.688 6.79181 14.4654 7.70902 14.3011 8.25108C14.3024 8.25237 15.1006 9.65601 17.2844 9.22522C17.7475 8.18769 17.9998 6.84355 17.9998 5.66501C17.9998 2.4942 16.3956 0.649414 13.4564 0.649414C10.433 0.649414 8.66587 2.99227 8.66587 6.08028C8.66587 9.13983 10.085 11.7673 12.424 12.964C11.4408 14.9472 10.1885 16.6949 8.88321 18.0119C6.51578 15.1244 4.37474 11.2744 3.49503 3.75942H-0.000488281C1.61402 16.2758 6.42522 20.2603 7.69691 21.0262C8.41619 21.4621 9.03716 21.4414 9.69435 21.0676C10.7267 20.4751 13.8289 17.3495 15.547 13.6871C16.2675 13.6845 17.1343 13.6017 17.9985 13.4038V10.9393C17.4694 11.0622 16.9584 11.1166 16.4978 11.1166C13.9066 11.1166 11.913 9.29249 11.913 6.12039Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4377 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1812 3.26 19.2651 3.28338 19.3325 3.24625L20.7144 2.51338C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56063 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14087 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7483 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60287 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40438 10.7731 5.08187L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="project-box-style3" data-aos="fade-in" data-aos-duration="800">
                            <div class="header_project">
                                <div class="image">
                                    <img class="mask" src="./assets/images/common/project_9.png" alt="">
                                    <div class="shape">
                                        <img src="./assets/images/common/shape_2.png" alt="">
                                    </div>
                                </div>
                                <h5 class="heading"><a href="project-list.html">Codyfight IGO</a></h5>
                            </div>
                            <div class="content">
                                <div class="td td1">
                                    <p>Total raise</p>
                                    <p >$3970</p>
                                </div>
                                <div class="td td2">
                                    <p>Price</p>
                                    <p >0.05 USDT</p>
                                </div>
                                <div class="td td3">
                                    <p>Chain</p>
                                    <p ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" rx="12" fill="#414B57"/>
                                        <path d="M17.3047 14.0836L12.5508 20.1957C12.486 20.2807 12.4027 20.3499 12.3073 20.398C12.2119 20.4462 12.1069 20.4721 12 20.4738V15.8375L16.8876 13.5595C16.9577 13.5262 17.0371 13.5176 17.1127 13.5351C17.1883 13.5526 17.2558 13.5952 17.3042 13.656C17.3525 13.7167 17.3789 13.792 17.379 13.8697C17.3791 13.9473 17.3529 14.0227 17.3047 14.0836Z" fill="white"/>
                                        <path d="M12.0001 15.8375V20.4738C11.8932 20.4721 11.7881 20.4462 11.6927 20.398C11.5973 20.3499 11.5141 20.2807 11.4493 20.1957L6.69539 14.0836C6.64719 14.0227 6.621 13.9473 6.62109 13.8697C6.62119 13.792 6.64755 13.7167 6.69591 13.656C6.74426 13.5952 6.81174 13.5526 6.88739 13.5351C6.96303 13.5176 7.04237 13.5262 7.1125 13.5595L12.0001 15.8375Z" fill="white"/>
                                        <path d="M11.9997 10.0929V14.7452C11.9347 14.747 11.8703 14.7323 11.8125 14.7024L6.63617 12.1998C6.57754 12.17 6.52611 12.1278 6.48548 12.076C6.44484 12.0243 6.41597 11.9644 6.40088 11.9003L11.9997 10.0929Z" fill="white"/>
                                        <path d="M12 3.52625V10.0929L6.40122 11.9004C6.38429 11.8382 6.38077 11.7732 6.39092 11.7096C6.40106 11.6459 6.42462 11.5852 6.46004 11.5314L11.4278 3.84709C11.4877 3.74905 11.5718 3.66804 11.672 3.61186C11.7722 3.55567 11.8851 3.52619 12 3.52625Z" fill="white"/>
                                        <path d="M17.5988 11.9004L12 10.0929V3.52625C12.1149 3.52619 12.2278 3.55567 12.328 3.61186C12.4282 3.66804 12.5123 3.74905 12.5722 3.84709L17.54 11.5314C17.5754 11.5852 17.599 11.6459 17.6091 11.7096C17.6192 11.7732 17.6157 11.8382 17.5988 11.9004Z" fill="white"/>
                                        <path d="M17.5988 11.9003C17.5837 11.9644 17.5548 12.0243 17.5142 12.076C17.4736 12.1278 17.4221 12.17 17.3635 12.1998L12.1872 14.7024C12.1294 14.7323 12.065 14.747 12 14.7452V10.0929L17.5988 11.9003Z" fill="white"/>
                                        </svg>
                                    </p>
                                </div>
                                <div class="td td4">
                                    <p>Next claim in</p>
                                    <div class="featured-countdown style3">
                                        <span class="slogan"></span>
                                        <span class="js-countdown" data-timer="1865550"></span> 
                                    </div>
                                </div>
                                <div class="td td5">
                                    <ul class="social">
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3363 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33262 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19313 6.899 1.48225 6.68862 0.88 6.35725C0.88 6.371 0.88 6.38888 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9388 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0518C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36562 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09162 22 2.17863Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                    <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 0.466675C8.16933 0.466675 5.86667 2.76934 5.86667 5.60001V14.4C5.86667 14.8033 5.53813 15.1333 5.13333 15.1333C4.72853 15.1333 4.4 14.8033 4.4 14.4V10.7333H0V14.4C0 17.2307 2.30267 19.5333 5.13333 19.5333C7.964 19.5333 10.2667 17.2307 10.2667 14.4V5.60001C10.2667 5.19521 10.5952 4.86667 11 4.86667C11.4048 4.86667 11.7333 5.19521 11.7333 5.60001V8.38521L13.9333 9.85188L16.1333 8.38521V5.60001C16.1333 2.76934 13.8307 0.466675 11 0.466675Z" fill="#798DA3"/>
                                                    <path d="M17.6001 10.7334V14.4001C17.6001 14.8034 17.2701 15.1334 16.8667 15.1334C16.4634 15.1334 16.1334 14.8034 16.1334 14.4001V10.1482L14.3397 11.3435C14.2165 11.4257 14.0757 11.4667 13.9334 11.4667C13.7911 11.4667 13.6503 11.4257 13.5271 11.3435L11.7334 10.1482V14.4001C11.7334 17.2307 14.0361 19.5334 16.8667 19.5334C19.6974 19.5334 22.0001 17.2307 22.0001 14.4001V10.7334H17.6001Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.913 6.12039C11.913 4.56668 12.5094 3.75813 13.3516 3.75813C14.1537 3.75813 14.688 4.48388 14.688 5.95479C14.688 6.79181 14.4654 7.70902 14.3011 8.25108C14.3024 8.25237 15.1006 9.65601 17.2844 9.22522C17.7475 8.18769 17.9998 6.84355 17.9998 5.66501C17.9998 2.4942 16.3956 0.649414 13.4564 0.649414C10.433 0.649414 8.66587 2.99227 8.66587 6.08028C8.66587 9.13983 10.085 11.7673 12.424 12.964C11.4408 14.9472 10.1885 16.6949 8.88321 18.0119C6.51578 15.1244 4.37474 11.2744 3.49503 3.75942H-0.000488281C1.61402 16.2758 6.42522 20.2603 7.69691 21.0262C8.41619 21.4621 9.03716 21.4414 9.69435 21.0676C10.7267 20.4751 13.8289 17.3495 15.547 13.6871C16.2675 13.6845 17.1343 13.6017 17.9985 13.4038V10.9393C17.4694 11.0622 16.9584 11.1166 16.4978 11.1166C13.9066 11.1166 11.913 9.29249 11.913 6.12039Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4377 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1812 3.26 19.2651 3.28338 19.3325 3.24625L20.7144 2.51338C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56063 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14087 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7483 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60287 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40438 10.7731 5.08187L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="project-box-style3" data-aos="fade-in" data-aos-duration="800">
                            <div class="header_project">
                                <div class="image">
                                    <img class="mask" src="./assets/images/common/project_10.png" alt="">
                                    <div class="shape">
                                        <img src="./assets/images/common/shape_2.png" alt="">
                                    </div>
                                </div>
                                <h5 class="heading"><a href="project-list.html">Asphalt 9: Legends</a></h5>
                            </div>
                            <div class="content">
                                <div class="td td1">
                                    <p>Total raise</p>
                                    <p >$3970</p>
                                </div>
                                <div class="td td2">
                                    <p>Price</p>
                                    <p >0.05 USDT</p>
                                </div>
                                <div class="td td3">
                                    <p>Chain</p>
                                    <p ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" rx="12" fill="#414B57"/>
                                        <path d="M17.3047 14.0836L12.5508 20.1957C12.486 20.2807 12.4027 20.3499 12.3073 20.398C12.2119 20.4462 12.1069 20.4721 12 20.4738V15.8375L16.8876 13.5595C16.9577 13.5262 17.0371 13.5176 17.1127 13.5351C17.1883 13.5526 17.2558 13.5952 17.3042 13.656C17.3525 13.7167 17.3789 13.792 17.379 13.8697C17.3791 13.9473 17.3529 14.0227 17.3047 14.0836Z" fill="white"/>
                                        <path d="M12.0001 15.8375V20.4738C11.8932 20.4721 11.7881 20.4462 11.6927 20.398C11.5973 20.3499 11.5141 20.2807 11.4493 20.1957L6.69539 14.0836C6.64719 14.0227 6.621 13.9473 6.62109 13.8697C6.62119 13.792 6.64755 13.7167 6.69591 13.656C6.74426 13.5952 6.81174 13.5526 6.88739 13.5351C6.96303 13.5176 7.04237 13.5262 7.1125 13.5595L12.0001 15.8375Z" fill="white"/>
                                        <path d="M11.9997 10.0929V14.7452C11.9347 14.747 11.8703 14.7323 11.8125 14.7024L6.63617 12.1998C6.57754 12.17 6.52611 12.1278 6.48548 12.076C6.44484 12.0243 6.41597 11.9644 6.40088 11.9003L11.9997 10.0929Z" fill="white"/>
                                        <path d="M12 3.52625V10.0929L6.40122 11.9004C6.38429 11.8382 6.38077 11.7732 6.39092 11.7096C6.40106 11.6459 6.42462 11.5852 6.46004 11.5314L11.4278 3.84709C11.4877 3.74905 11.5718 3.66804 11.672 3.61186C11.7722 3.55567 11.8851 3.52619 12 3.52625Z" fill="white"/>
                                        <path d="M17.5988 11.9004L12 10.0929V3.52625C12.1149 3.52619 12.2278 3.55567 12.328 3.61186C12.4282 3.66804 12.5123 3.74905 12.5722 3.84709L17.54 11.5314C17.5754 11.5852 17.599 11.6459 17.6091 11.7096C17.6192 11.7732 17.6157 11.8382 17.5988 11.9004Z" fill="white"/>
                                        <path d="M17.5988 11.9003C17.5837 11.9644 17.5548 12.0243 17.5142 12.076C17.4736 12.1278 17.4221 12.17 17.3635 12.1998L12.1872 14.7024C12.1294 14.7323 12.065 14.747 12 14.7452V10.0929L17.5988 11.9003Z" fill="white"/>
                                        </svg>
                                    </p>
                                </div>
                                <div class="td td4">
                                    <p>Next claim in</p>
                                    <div class="featured-countdown style3">
                                        <span class="slogan"></span>
                                        <span class="js-countdown" data-timer="1865550"></span> 
                                    </div>
                                </div>
                                <div class="td td5">
                                    <ul class="social">
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3363 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33262 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19313 6.899 1.48225 6.68862 0.88 6.35725C0.88 6.371 0.88 6.38888 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9388 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0518C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36562 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09162 22 2.17863Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                    <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 0.466675C8.16933 0.466675 5.86667 2.76934 5.86667 5.60001V14.4C5.86667 14.8033 5.53813 15.1333 5.13333 15.1333C4.72853 15.1333 4.4 14.8033 4.4 14.4V10.7333H0V14.4C0 17.2307 2.30267 19.5333 5.13333 19.5333C7.964 19.5333 10.2667 17.2307 10.2667 14.4V5.60001C10.2667 5.19521 10.5952 4.86667 11 4.86667C11.4048 4.86667 11.7333 5.19521 11.7333 5.60001V8.38521L13.9333 9.85188L16.1333 8.38521V5.60001C16.1333 2.76934 13.8307 0.466675 11 0.466675Z" fill="#798DA3"/>
                                                    <path d="M17.6001 10.7334V14.4001C17.6001 14.8034 17.2701 15.1334 16.8667 15.1334C16.4634 15.1334 16.1334 14.8034 16.1334 14.4001V10.1482L14.3397 11.3435C14.2165 11.4257 14.0757 11.4667 13.9334 11.4667C13.7911 11.4667 13.6503 11.4257 13.5271 11.3435L11.7334 10.1482V14.4001C11.7334 17.2307 14.0361 19.5334 16.8667 19.5334C19.6974 19.5334 22.0001 17.2307 22.0001 14.4001V10.7334H17.6001Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.913 6.12039C11.913 4.56668 12.5094 3.75813 13.3516 3.75813C14.1537 3.75813 14.688 4.48388 14.688 5.95479C14.688 6.79181 14.4654 7.70902 14.3011 8.25108C14.3024 8.25237 15.1006 9.65601 17.2844 9.22522C17.7475 8.18769 17.9998 6.84355 17.9998 5.66501C17.9998 2.4942 16.3956 0.649414 13.4564 0.649414C10.433 0.649414 8.66587 2.99227 8.66587 6.08028C8.66587 9.13983 10.085 11.7673 12.424 12.964C11.4408 14.9472 10.1885 16.6949 8.88321 18.0119C6.51578 15.1244 4.37474 11.2744 3.49503 3.75942H-0.000488281C1.61402 16.2758 6.42522 20.2603 7.69691 21.0262C8.41619 21.4621 9.03716 21.4414 9.69435 21.0676C10.7267 20.4751 13.8289 17.3495 15.547 13.6871C16.2675 13.6845 17.1343 13.6017 17.9985 13.4038V10.9393C17.4694 11.0622 16.9584 11.1166 16.4978 11.1166C13.9066 11.1166 11.913 9.29249 11.913 6.12039Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4377 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1812 3.26 19.2651 3.28338 19.3325 3.24625L20.7144 2.51338C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56063 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14087 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7483 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60287 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40438 10.7731 5.08187L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="project-box-style3" data-aos="fade-in" data-aos-duration="800">
                            <div class="header_project">
                                <div class="image">
                                    <img class="mask" src="./assets/images/common/project_11.png" alt="">
                                    <div class="shape">
                                        <img src="./assets/images/common/shape_2.png" alt="">
                                    </div>
                                </div>
                                <h5 class="heading"><a href="project-list.html">Garena Free Fire MAX</a></h5>
                            </div>
                            <div class="content">
                                <div class="td td1">
                                    <p>Total raise</p>
                                    <p >$3970</p>
                                </div>
                                <div class="td td2">
                                    <p>Price</p>
                                    <p >0.05 USDT</p>
                                </div>
                                <div class="td td3">
                                    <p>Chain</p>
                                    <p ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" rx="12" fill="#414B57"/>
                                        <path d="M17.3047 14.0836L12.5508 20.1957C12.486 20.2807 12.4027 20.3499 12.3073 20.398C12.2119 20.4462 12.1069 20.4721 12 20.4738V15.8375L16.8876 13.5595C16.9577 13.5262 17.0371 13.5176 17.1127 13.5351C17.1883 13.5526 17.2558 13.5952 17.3042 13.656C17.3525 13.7167 17.3789 13.792 17.379 13.8697C17.3791 13.9473 17.3529 14.0227 17.3047 14.0836Z" fill="white"/>
                                        <path d="M12.0001 15.8375V20.4738C11.8932 20.4721 11.7881 20.4462 11.6927 20.398C11.5973 20.3499 11.5141 20.2807 11.4493 20.1957L6.69539 14.0836C6.64719 14.0227 6.621 13.9473 6.62109 13.8697C6.62119 13.792 6.64755 13.7167 6.69591 13.656C6.74426 13.5952 6.81174 13.5526 6.88739 13.5351C6.96303 13.5176 7.04237 13.5262 7.1125 13.5595L12.0001 15.8375Z" fill="white"/>
                                        <path d="M11.9997 10.0929V14.7452C11.9347 14.747 11.8703 14.7323 11.8125 14.7024L6.63617 12.1998C6.57754 12.17 6.52611 12.1278 6.48548 12.076C6.44484 12.0243 6.41597 11.9644 6.40088 11.9003L11.9997 10.0929Z" fill="white"/>
                                        <path d="M12 3.52625V10.0929L6.40122 11.9004C6.38429 11.8382 6.38077 11.7732 6.39092 11.7096C6.40106 11.6459 6.42462 11.5852 6.46004 11.5314L11.4278 3.84709C11.4877 3.74905 11.5718 3.66804 11.672 3.61186C11.7722 3.55567 11.8851 3.52619 12 3.52625Z" fill="white"/>
                                        <path d="M17.5988 11.9004L12 10.0929V3.52625C12.1149 3.52619 12.2278 3.55567 12.328 3.61186C12.4282 3.66804 12.5123 3.74905 12.5722 3.84709L17.54 11.5314C17.5754 11.5852 17.599 11.6459 17.6091 11.7096C17.6192 11.7732 17.6157 11.8382 17.5988 11.9004Z" fill="white"/>
                                        <path d="M17.5988 11.9003C17.5837 11.9644 17.5548 12.0243 17.5142 12.076C17.4736 12.1278 17.4221 12.17 17.3635 12.1998L12.1872 14.7024C12.1294 14.7323 12.065 14.747 12 14.7452V10.0929L17.5988 11.9003Z" fill="white"/>
                                        </svg>
                                    </p>
                                </div>
                                <div class="td td4">
                                    <p>Next claim in</p>
                                    <div class="featured-countdown style3">
                                        <span class="slogan"></span>
                                        <span class="js-countdown" data-timer="1865550"></span> 
                                    </div>
                                </div>
                                <div class="td td5">
                                    <ul class="social">
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3363 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33262 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19313 6.899 1.48225 6.68862 0.88 6.35725C0.88 6.371 0.88 6.38888 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9388 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0518C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36562 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09162 22 2.17863Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                    <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 0.466675C8.16933 0.466675 5.86667 2.76934 5.86667 5.60001V14.4C5.86667 14.8033 5.53813 15.1333 5.13333 15.1333C4.72853 15.1333 4.4 14.8033 4.4 14.4V10.7333H0V14.4C0 17.2307 2.30267 19.5333 5.13333 19.5333C7.964 19.5333 10.2667 17.2307 10.2667 14.4V5.60001C10.2667 5.19521 10.5952 4.86667 11 4.86667C11.4048 4.86667 11.7333 5.19521 11.7333 5.60001V8.38521L13.9333 9.85188L16.1333 8.38521V5.60001C16.1333 2.76934 13.8307 0.466675 11 0.466675Z" fill="#798DA3"/>
                                                    <path d="M17.6001 10.7334V14.4001C17.6001 14.8034 17.2701 15.1334 16.8667 15.1334C16.4634 15.1334 16.1334 14.8034 16.1334 14.4001V10.1482L14.3397 11.3435C14.2165 11.4257 14.0757 11.4667 13.9334 11.4667C13.7911 11.4667 13.6503 11.4257 13.5271 11.3435L11.7334 10.1482V14.4001C11.7334 17.2307 14.0361 19.5334 16.8667 19.5334C19.6974 19.5334 22.0001 17.2307 22.0001 14.4001V10.7334H17.6001Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.913 6.12039C11.913 4.56668 12.5094 3.75813 13.3516 3.75813C14.1537 3.75813 14.688 4.48388 14.688 5.95479C14.688 6.79181 14.4654 7.70902 14.3011 8.25108C14.3024 8.25237 15.1006 9.65601 17.2844 9.22522C17.7475 8.18769 17.9998 6.84355 17.9998 5.66501C17.9998 2.4942 16.3956 0.649414 13.4564 0.649414C10.433 0.649414 8.66587 2.99227 8.66587 6.08028C8.66587 9.13983 10.085 11.7673 12.424 12.964C11.4408 14.9472 10.1885 16.6949 8.88321 18.0119C6.51578 15.1244 4.37474 11.2744 3.49503 3.75942H-0.000488281C1.61402 16.2758 6.42522 20.2603 7.69691 21.0262C8.41619 21.4621 9.03716 21.4414 9.69435 21.0676C10.7267 20.4751 13.8289 17.3495 15.547 13.6871C16.2675 13.6845 17.1343 13.6017 17.9985 13.4038V10.9393C17.4694 11.0622 16.9584 11.1166 16.4978 11.1166C13.9066 11.1166 11.913 9.29249 11.913 6.12039Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4377 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1812 3.26 19.2651 3.28338 19.3325 3.24625L20.7144 2.51338C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56063 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14087 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7483 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60287 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40438 10.7731 5.08187L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="project-box-style3" data-aos="fade-in" data-aos-duration="800">
                            <div class="header_project">
                                <div class="image">
                                    <img class="mask" src="./assets/images/common/project_8.png" alt="">
                                    <div class="shape">
                                        <img src="./assets/images/common/shape_2.png" alt="">
                                    </div>
                                </div>
                                <h5 class="heading"><a href="project-list.html">Need for Speed™ No Limits</a></h5>
                            </div>
                            <div class="content">
                                <div class="td td1">
                                    <p>Total raise</p>
                                    <p >$3970</p>
                                </div>
                                <div class="td td2">
                                    <p>Price</p>
                                    <p >0.05 USDT</p>
                                </div>
                                <div class="td td3">
                                    <p>Chain</p>
                                    <p ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" rx="12" fill="#414B57"/>
                                        <path d="M17.3047 14.0836L12.5508 20.1957C12.486 20.2807 12.4027 20.3499 12.3073 20.398C12.2119 20.4462 12.1069 20.4721 12 20.4738V15.8375L16.8876 13.5595C16.9577 13.5262 17.0371 13.5176 17.1127 13.5351C17.1883 13.5526 17.2558 13.5952 17.3042 13.656C17.3525 13.7167 17.3789 13.792 17.379 13.8697C17.3791 13.9473 17.3529 14.0227 17.3047 14.0836Z" fill="white"/>
                                        <path d="M12.0001 15.8375V20.4738C11.8932 20.4721 11.7881 20.4462 11.6927 20.398C11.5973 20.3499 11.5141 20.2807 11.4493 20.1957L6.69539 14.0836C6.64719 14.0227 6.621 13.9473 6.62109 13.8697C6.62119 13.792 6.64755 13.7167 6.69591 13.656C6.74426 13.5952 6.81174 13.5526 6.88739 13.5351C6.96303 13.5176 7.04237 13.5262 7.1125 13.5595L12.0001 15.8375Z" fill="white"/>
                                        <path d="M11.9997 10.0929V14.7452C11.9347 14.747 11.8703 14.7323 11.8125 14.7024L6.63617 12.1998C6.57754 12.17 6.52611 12.1278 6.48548 12.076C6.44484 12.0243 6.41597 11.9644 6.40088 11.9003L11.9997 10.0929Z" fill="white"/>
                                        <path d="M12 3.52625V10.0929L6.40122 11.9004C6.38429 11.8382 6.38077 11.7732 6.39092 11.7096C6.40106 11.6459 6.42462 11.5852 6.46004 11.5314L11.4278 3.84709C11.4877 3.74905 11.5718 3.66804 11.672 3.61186C11.7722 3.55567 11.8851 3.52619 12 3.52625Z" fill="white"/>
                                        <path d="M17.5988 11.9004L12 10.0929V3.52625C12.1149 3.52619 12.2278 3.55567 12.328 3.61186C12.4282 3.66804 12.5123 3.74905 12.5722 3.84709L17.54 11.5314C17.5754 11.5852 17.599 11.6459 17.6091 11.7096C17.6192 11.7732 17.6157 11.8382 17.5988 11.9004Z" fill="white"/>
                                        <path d="M17.5988 11.9003C17.5837 11.9644 17.5548 12.0243 17.5142 12.076C17.4736 12.1278 17.4221 12.17 17.3635 12.1998L12.1872 14.7024C12.1294 14.7323 12.065 14.747 12 14.7452V10.0929L17.5988 11.9003Z" fill="white"/>
                                        </svg>
                                    </p>
                                </div>
                                <div class="td td4">
                                    <p>Next claim in</p>
                                    <div class="featured-countdown style3">
                                        <span class="slogan"></span>
                                        <span class="js-countdown" data-timer="1865550"></span> 
                                    </div>
                                </div>
                                <div class="td td5">
                                    <ul class="social">
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22 2.17863C21.1819 2.5375 20.3101 2.77537 19.4012 2.89087C20.3363 2.33262 21.0499 1.45537 21.3854 0.398C20.5136 0.91775 19.5511 1.28488 18.5254 1.48975C17.6976 0.608375 16.5179 0.0625 15.2309 0.0625C12.7339 0.0625 10.7236 2.08925 10.7236 4.57388C10.7236 4.93138 10.7539 5.27512 10.8281 5.60237C7.0785 5.4195 3.76063 3.62238 1.53175 0.88475C1.14262 1.55988 0.914375 2.33262 0.914375 3.1645C0.914375 4.7265 1.71875 6.11112 2.91775 6.91275C2.19313 6.899 1.48225 6.68862 0.88 6.35725C0.88 6.371 0.88 6.38888 0.88 6.40675C0.88 8.5985 2.44337 10.419 4.4935 10.8384C4.12637 10.9388 3.72625 10.9869 3.311 10.9869C3.02225 10.9869 2.73075 10.9704 2.45712 10.9099C3.0415 12.696 4.69975 14.0091 6.6715 14.0518C5.137 15.2521 3.18863 15.9754 1.07938 15.9754C0.7095 15.9754 0.35475 15.9589 0 15.9135C1.99787 17.2019 4.36562 17.9375 6.919 17.9375C15.2185 17.9375 19.756 11.0625 19.756 5.10325C19.756 4.90387 19.7491 4.71138 19.7395 4.52025C20.6346 3.885 21.3867 3.09162 22 2.17863Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.3127 0H16.173L8.5376 13.3746L13.4573 22H18.5971L13.6773 13.3746L21.3127 0Z" fill="#798DA3"/>
                                                    <path d="M6.41162 4.125H1.56613L4.36975 9.06262L0.6875 15.125H5.533L9.21525 9.06262L6.41162 4.125Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 0.466675C8.16933 0.466675 5.86667 2.76934 5.86667 5.60001V14.4C5.86667 14.8033 5.53813 15.1333 5.13333 15.1333C4.72853 15.1333 4.4 14.8033 4.4 14.4V10.7333H0V14.4C0 17.2307 2.30267 19.5333 5.13333 19.5333C7.964 19.5333 10.2667 17.2307 10.2667 14.4V5.60001C10.2667 5.19521 10.5952 4.86667 11 4.86667C11.4048 4.86667 11.7333 5.19521 11.7333 5.60001V8.38521L13.9333 9.85188L16.1333 8.38521V5.60001C16.1333 2.76934 13.8307 0.466675 11 0.466675Z" fill="#798DA3"/>
                                                    <path d="M17.6001 10.7334V14.4001C17.6001 14.8034 17.2701 15.1334 16.8667 15.1334C16.4634 15.1334 16.1334 14.8034 16.1334 14.4001V10.1482L14.3397 11.3435C14.2165 11.4257 14.0757 11.4667 13.9334 11.4667C13.7911 11.4667 13.6503 11.4257 13.5271 11.3435L11.7334 10.1482V14.4001C11.7334 17.2307 14.0361 19.5334 16.8667 19.5334C19.6974 19.5334 22.0001 17.2307 22.0001 14.4001V10.7334H17.6001Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.913 6.12039C11.913 4.56668 12.5094 3.75813 13.3516 3.75813C14.1537 3.75813 14.688 4.48388 14.688 5.95479C14.688 6.79181 14.4654 7.70902 14.3011 8.25108C14.3024 8.25237 15.1006 9.65601 17.2844 9.22522C17.7475 8.18769 17.9998 6.84355 17.9998 5.66501C17.9998 2.4942 16.3956 0.649414 13.4564 0.649414C10.433 0.649414 8.66587 2.99227 8.66587 6.08028C8.66587 9.13983 10.085 11.7673 12.424 12.964C11.4408 14.9472 10.1885 16.6949 8.88321 18.0119C6.51578 15.1244 4.37474 11.2744 3.49503 3.75942H-0.000488281C1.61402 16.2758 6.42522 20.2603 7.69691 21.0262C8.41619 21.4621 9.03716 21.4414 9.69435 21.0676C10.7267 20.4751 13.8289 17.3495 15.547 13.6871C16.2675 13.6845 17.1343 13.6017 17.9985 13.4038V10.9393C17.4694 11.0622 16.9584 11.1166 16.4978 11.1166C13.9066 11.1166 11.913 9.29249 11.913 6.12039Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.6065 5.76663C18.4126 5.702 18.2256 5.64012 18.0469 5.581C16.6774 5.13412 15.8524 4.86325 15.8524 3.75637C15.8524 2.8585 16.5193 2.20812 17.4377 2.20812C18.1418 2.20812 18.667 2.512 19.1373 3.19675C19.1812 3.26 19.2651 3.28338 19.3325 3.24625L20.7144 2.51338C20.7515 2.49412 20.7804 2.45975 20.7914 2.41712C20.8024 2.3745 20.7983 2.3305 20.779 2.292C20.0379 0.92525 18.9709 0.261125 17.5147 0.261125C15.2996 0.261125 13.8669 1.654 13.8669 3.80862C13.8669 6.01137 15.2529 6.90375 17.8076 7.77687C19.2871 8.28975 19.943 8.56063 19.943 9.65512C19.943 10.8857 18.8746 11.7699 17.4171 11.7176C15.8895 11.664 15.4275 10.8239 14.8459 9.44613C13.8614 7.11275 12.7407 4.39025 12.7311 4.36413C11.6077 1.66913 9.37887 0.125 6.6165 0.125C2.96862 0.125 0 3.20913 0 7.00138C0 10.7909 2.96862 13.875 6.6165 13.875C8.60612 13.875 10.472 12.9592 11.7343 11.3601C11.77 11.3134 11.7796 11.2501 11.7563 11.1951L10.923 9.19588C10.8996 9.14087 10.846 9.10238 10.7869 9.09963C10.7264 9.09688 10.6728 9.13125 10.6453 9.18487C9.85738 10.7483 8.31325 11.719 6.6165 11.719C4.11262 11.719 2.07625 9.60287 2.07625 7C2.07625 4.39712 4.11262 2.281 6.6165 2.281C8.43975 2.281 10.109 3.40438 10.7731 5.08187L12.837 9.97L13.0749 10.5186C14.0071 12.775 15.378 13.787 17.5244 13.7953C20.0764 13.7953 22 12.038 22 9.70875C22 7.37263 20.7556 6.49538 18.6065 5.76663Z" fill="#798DA3"/>
                                                    </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <section class="tf-section tf_team">
        <div class="overlay">
            <img src="./assets/images/backgroup/bg_team_section.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tf-title mb40" data-aos="fade-up" data-aos-duration="800">
                        <h2 class="title">
                            Meet the team
                        </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="team-box-wrapper">
                        <div class="team-box" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                            <img class="shape" src="./assets/images/common/shape_3.png" alt="">
                            <img class="shape_ecfect" src="./assets/images/common/shape_4.svg" alt="">
                            <div class="image">
                                <img src="./assets/images/common/team_1.png" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name"><a href="team-details.html">Darrell Steward</a></h5>
                                <p class="position">Senior Designer</p>
                                <ul class="social">
                                    <li>
                                        <a href="#">
                                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.20381 22V11.9655H11.5706L12.0757 8.05372H8.20381V5.55662C8.20381 4.42442 8.51692 3.65284 10.1423 3.65284L12.212 3.65199V0.153153C11.8541 0.10664 10.6255 0 9.19548 0C6.20942 0 4.16511 1.82266 4.16511 5.1692V8.05372H0.788086V11.9655H4.16511V22H8.20381Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.5 2.17863C21.6819 2.5375 20.8101 2.77537 19.9012 2.89087C20.8363 2.33262 21.5499 1.45537 21.8854 0.398C21.0136 0.91775 20.0511 1.28488 19.0254 1.48975C18.1976 0.608375 17.0179 0.0625 15.7309 0.0625C13.2339 0.0625 11.2236 2.08925 11.2236 4.57388C11.2236 4.93138 11.2539 5.27512 11.3281 5.60237C7.5785 5.4195 4.26063 3.62238 2.03175 0.88475C1.64262 1.55988 1.41438 2.33262 1.41438 3.1645C1.41438 4.7265 2.21875 6.11112 3.41775 6.91275C2.69313 6.899 1.98225 6.68862 1.38 6.35725C1.38 6.371 1.38 6.38888 1.38 6.40675C1.38 8.5985 2.94337 10.419 4.9935 10.8384C4.62637 10.9388 4.22625 10.9869 3.811 10.9869C3.52225 10.9869 3.23075 10.9704 2.95712 10.9099C3.5415 12.696 5.19975 14.0091 7.1715 14.0518C5.637 15.2521 3.68863 15.9754 1.57938 15.9754C1.2095 15.9754 0.85475 15.9589 0.5 15.9135C2.49787 17.2019 4.86562 17.9375 7.419 17.9375C15.7185 17.9375 20.256 11.0625 20.256 5.10325C20.256 4.90387 20.2491 4.71138 20.2395 4.52025C21.1346 3.885 21.8867 3.09162 22.5 2.17863Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.3003 17.8V11.354C18.3003 8.18599 17.6183 5.76599 13.9223 5.76599C12.1403 5.76599 10.9523 6.73399 10.4683 7.65799H10.4243V6.05199H6.92627V17.8H10.5783V11.97C10.5783 10.43 10.8643 8.95599 12.7563 8.95599C14.6263 8.95599 14.6483 10.694 14.6483 12.058V17.778H18.3003V17.8Z" fill="#798DA3"/>
                                                <path d="M0.986328 6.052H4.63833V17.8H0.986328V6.052Z" fill="#798DA3"/>
                                                <path d="M2.8122 0.200012C1.6462 0.200012 0.700195 1.14601 0.700195 2.31201C0.700195 3.47801 1.6462 4.44601 2.8122 4.44601C3.9782 4.44601 4.9242 3.47801 4.9242 2.31201C4.9242 1.14601 3.9782 0.200012 2.8122 0.200012Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                            <img class="shape" src="./assets/images/common/shape_3.png" alt="">
                            <img class="shape_ecfect" src="./assets/images/common/shape_4.svg" alt="">
                            <div class="image">
                                <img src="./assets/images/common/team_2.png" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name"><a href="team-details.html">Kristin Watson</a></h5>
                                <p class="position">Senior Designer</p>
                                <ul class="social">
                                    <li>
                                        <a href="#">
                                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.20381 22V11.9655H11.5706L12.0757 8.05372H8.20381V5.55662C8.20381 4.42442 8.51692 3.65284 10.1423 3.65284L12.212 3.65199V0.153153C11.8541 0.10664 10.6255 0 9.19548 0C6.20942 0 4.16511 1.82266 4.16511 5.1692V8.05372H0.788086V11.9655H4.16511V22H8.20381Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.5 2.17863C21.6819 2.5375 20.8101 2.77537 19.9012 2.89087C20.8363 2.33262 21.5499 1.45537 21.8854 0.398C21.0136 0.91775 20.0511 1.28488 19.0254 1.48975C18.1976 0.608375 17.0179 0.0625 15.7309 0.0625C13.2339 0.0625 11.2236 2.08925 11.2236 4.57388C11.2236 4.93138 11.2539 5.27512 11.3281 5.60237C7.5785 5.4195 4.26063 3.62238 2.03175 0.88475C1.64262 1.55988 1.41438 2.33262 1.41438 3.1645C1.41438 4.7265 2.21875 6.11112 3.41775 6.91275C2.69313 6.899 1.98225 6.68862 1.38 6.35725C1.38 6.371 1.38 6.38888 1.38 6.40675C1.38 8.5985 2.94337 10.419 4.9935 10.8384C4.62637 10.9388 4.22625 10.9869 3.811 10.9869C3.52225 10.9869 3.23075 10.9704 2.95712 10.9099C3.5415 12.696 5.19975 14.0091 7.1715 14.0518C5.637 15.2521 3.68863 15.9754 1.57938 15.9754C1.2095 15.9754 0.85475 15.9589 0.5 15.9135C2.49787 17.2019 4.86562 17.9375 7.419 17.9375C15.7185 17.9375 20.256 11.0625 20.256 5.10325C20.256 4.90387 20.2491 4.71138 20.2395 4.52025C21.1346 3.885 21.8867 3.09162 22.5 2.17863Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.3003 17.8V11.354C18.3003 8.18599 17.6183 5.76599 13.9223 5.76599C12.1403 5.76599 10.9523 6.73399 10.4683 7.65799H10.4243V6.05199H6.92627V17.8H10.5783V11.97C10.5783 10.43 10.8643 8.95599 12.7563 8.95599C14.6263 8.95599 14.6483 10.694 14.6483 12.058V17.778H18.3003V17.8Z" fill="#798DA3"/>
                                                <path d="M0.986328 6.052H4.63833V17.8H0.986328V6.052Z" fill="#798DA3"/>
                                                <path d="M2.8122 0.200012C1.6462 0.200012 0.700195 1.14601 0.700195 2.31201C0.700195 3.47801 1.6462 4.44601 2.8122 4.44601C3.9782 4.44601 4.9242 3.47801 4.9242 2.31201C4.9242 1.14601 3.9782 0.200012 2.8122 0.200012Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-box" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                            <img class="shape" src="./assets/images/common/shape_3.png" alt="">
                            <img class="shape_ecfect" src="./assets/images/common/shape_4.svg" alt="">
                            <div class="image">
                                <img src="./assets/images/common/team_3.png" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name"><a href="team-details.html">Jacob Jones</a></h5>
                                <p class="position">Senior Designer</p>
                                <ul class="social">
                                    <li>
                                        <a href="#">
                                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.20381 22V11.9655H11.5706L12.0757 8.05372H8.20381V5.55662C8.20381 4.42442 8.51692 3.65284 10.1423 3.65284L12.212 3.65199V0.153153C11.8541 0.10664 10.6255 0 9.19548 0C6.20942 0 4.16511 1.82266 4.16511 5.1692V8.05372H0.788086V11.9655H4.16511V22H8.20381Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.5 2.17863C21.6819 2.5375 20.8101 2.77537 19.9012 2.89087C20.8363 2.33262 21.5499 1.45537 21.8854 0.398C21.0136 0.91775 20.0511 1.28488 19.0254 1.48975C18.1976 0.608375 17.0179 0.0625 15.7309 0.0625C13.2339 0.0625 11.2236 2.08925 11.2236 4.57388C11.2236 4.93138 11.2539 5.27512 11.3281 5.60237C7.5785 5.4195 4.26063 3.62238 2.03175 0.88475C1.64262 1.55988 1.41438 2.33262 1.41438 3.1645C1.41438 4.7265 2.21875 6.11112 3.41775 6.91275C2.69313 6.899 1.98225 6.68862 1.38 6.35725C1.38 6.371 1.38 6.38888 1.38 6.40675C1.38 8.5985 2.94337 10.419 4.9935 10.8384C4.62637 10.9388 4.22625 10.9869 3.811 10.9869C3.52225 10.9869 3.23075 10.9704 2.95712 10.9099C3.5415 12.696 5.19975 14.0091 7.1715 14.0518C5.637 15.2521 3.68863 15.9754 1.57938 15.9754C1.2095 15.9754 0.85475 15.9589 0.5 15.9135C2.49787 17.2019 4.86562 17.9375 7.419 17.9375C15.7185 17.9375 20.256 11.0625 20.256 5.10325C20.256 4.90387 20.2491 4.71138 20.2395 4.52025C21.1346 3.885 21.8867 3.09162 22.5 2.17863Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.3003 17.8V11.354C18.3003 8.18599 17.6183 5.76599 13.9223 5.76599C12.1403 5.76599 10.9523 6.73399 10.4683 7.65799H10.4243V6.05199H6.92627V17.8H10.5783V11.97C10.5783 10.43 10.8643 8.95599 12.7563 8.95599C14.6263 8.95599 14.6483 10.694 14.6483 12.058V17.778H18.3003V17.8Z" fill="#798DA3"/>
                                                <path d="M0.986328 6.052H4.63833V17.8H0.986328V6.052Z" fill="#798DA3"/>
                                                <path d="M2.8122 0.200012C1.6462 0.200012 0.700195 1.14601 0.700195 2.31201C0.700195 3.47801 1.6462 4.44601 2.8122 4.44601C3.9782 4.44601 4.9242 3.47801 4.9242 2.31201C4.9242 1.14601 3.9782 0.200012 2.8122 0.200012Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-box" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                            <img class="shape" src="./assets/images/common/shape_3.png" alt="">
                            <img class="shape_ecfect" src="./assets/images/common/shape_4.svg" alt="">
                            <div class="image">
                                <img src="./assets/images/common/team_4.png" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name"><a href="team-details.html">Jane Cooper</a></h5>
                                <p class="position">Senior Designer</p>
                                <ul class="social">
                                    <li>
                                        <a href="#">
                                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.20381 22V11.9655H11.5706L12.0757 8.05372H8.20381V5.55662C8.20381 4.42442 8.51692 3.65284 10.1423 3.65284L12.212 3.65199V0.153153C11.8541 0.10664 10.6255 0 9.19548 0C6.20942 0 4.16511 1.82266 4.16511 5.1692V8.05372H0.788086V11.9655H4.16511V22H8.20381Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.5 2.17863C21.6819 2.5375 20.8101 2.77537 19.9012 2.89087C20.8363 2.33262 21.5499 1.45537 21.8854 0.398C21.0136 0.91775 20.0511 1.28488 19.0254 1.48975C18.1976 0.608375 17.0179 0.0625 15.7309 0.0625C13.2339 0.0625 11.2236 2.08925 11.2236 4.57388C11.2236 4.93138 11.2539 5.27512 11.3281 5.60237C7.5785 5.4195 4.26063 3.62238 2.03175 0.88475C1.64262 1.55988 1.41438 2.33262 1.41438 3.1645C1.41438 4.7265 2.21875 6.11112 3.41775 6.91275C2.69313 6.899 1.98225 6.68862 1.38 6.35725C1.38 6.371 1.38 6.38888 1.38 6.40675C1.38 8.5985 2.94337 10.419 4.9935 10.8384C4.62637 10.9388 4.22625 10.9869 3.811 10.9869C3.52225 10.9869 3.23075 10.9704 2.95712 10.9099C3.5415 12.696 5.19975 14.0091 7.1715 14.0518C5.637 15.2521 3.68863 15.9754 1.57938 15.9754C1.2095 15.9754 0.85475 15.9589 0.5 15.9135C2.49787 17.2019 4.86562 17.9375 7.419 17.9375C15.7185 17.9375 20.256 11.0625 20.256 5.10325C20.256 4.90387 20.2491 4.71138 20.2395 4.52025C21.1346 3.885 21.8867 3.09162 22.5 2.17863Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.3003 17.8V11.354C18.3003 8.18599 17.6183 5.76599 13.9223 5.76599C12.1403 5.76599 10.9523 6.73399 10.4683 7.65799H10.4243V6.05199H6.92627V17.8H10.5783V11.97C10.5783 10.43 10.8643 8.95599 12.7563 8.95599C14.6263 8.95599 14.6483 10.694 14.6483 12.058V17.778H18.3003V17.8Z" fill="#798DA3"/>
                                                <path d="M0.986328 6.052H4.63833V17.8H0.986328V6.052Z" fill="#798DA3"/>
                                                <path d="M2.8122 0.200012C1.6462 0.200012 0.700195 1.14601 0.700195 2.31201C0.700195 3.47801 1.6462 4.44601 2.8122 4.44601C3.9782 4.44601 4.9242 3.47801 4.9242 2.31201C4.9242 1.14601 3.9782 0.200012 2.8122 0.200012Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="team-box" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                            <img class="shape" src="./assets/images/common/shape_3.png" alt="">
                            <img class="shape_ecfect" src="./assets/images/common/shape_4.svg" alt="">
                            <div class="image">
                                <img src="./assets/images/common/team_5.png" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name"><a href="team-details.html">Jenny Wilson</a></h5>
                                <p class="position">Senior Designer</p>
                                <ul class="social">
                                    <li>
                                        <a href="#">
                                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.20381 22V11.9655H11.5706L12.0757 8.05372H8.20381V5.55662C8.20381 4.42442 8.51692 3.65284 10.1423 3.65284L12.212 3.65199V0.153153C11.8541 0.10664 10.6255 0 9.19548 0C6.20942 0 4.16511 1.82266 4.16511 5.1692V8.05372H0.788086V11.9655H4.16511V22H8.20381Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.5 2.17863C21.6819 2.5375 20.8101 2.77537 19.9012 2.89087C20.8363 2.33262 21.5499 1.45537 21.8854 0.398C21.0136 0.91775 20.0511 1.28488 19.0254 1.48975C18.1976 0.608375 17.0179 0.0625 15.7309 0.0625C13.2339 0.0625 11.2236 2.08925 11.2236 4.57388C11.2236 4.93138 11.2539 5.27512 11.3281 5.60237C7.5785 5.4195 4.26063 3.62238 2.03175 0.88475C1.64262 1.55988 1.41438 2.33262 1.41438 3.1645C1.41438 4.7265 2.21875 6.11112 3.41775 6.91275C2.69313 6.899 1.98225 6.68862 1.38 6.35725C1.38 6.371 1.38 6.38888 1.38 6.40675C1.38 8.5985 2.94337 10.419 4.9935 10.8384C4.62637 10.9388 4.22625 10.9869 3.811 10.9869C3.52225 10.9869 3.23075 10.9704 2.95712 10.9099C3.5415 12.696 5.19975 14.0091 7.1715 14.0518C5.637 15.2521 3.68863 15.9754 1.57938 15.9754C1.2095 15.9754 0.85475 15.9589 0.5 15.9135C2.49787 17.2019 4.86562 17.9375 7.419 17.9375C15.7185 17.9375 20.256 11.0625 20.256 5.10325C20.256 4.90387 20.2491 4.71138 20.2395 4.52025C21.1346 3.885 21.8867 3.09162 22.5 2.17863Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.3003 17.8V11.354C18.3003 8.18599 17.6183 5.76599 13.9223 5.76599C12.1403 5.76599 10.9523 6.73399 10.4683 7.65799H10.4243V6.05199H6.92627V17.8H10.5783V11.97C10.5783 10.43 10.8643 8.95599 12.7563 8.95599C14.6263 8.95599 14.6483 10.694 14.6483 12.058V17.778H18.3003V17.8Z" fill="#798DA3"/>
                                                <path d="M0.986328 6.052H4.63833V17.8H0.986328V6.052Z" fill="#798DA3"/>
                                                <path d="M2.8122 0.200012C1.6462 0.200012 0.700195 1.14601 0.700195 2.31201C0.700195 3.47801 1.6462 4.44601 2.8122 4.44601C3.9782 4.44601 4.9242 3.47801 4.9242 2.31201C4.9242 1.14601 3.9782 0.200012 2.8122 0.200012Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                            <img class="shape" src="./assets/images/common/shape_3.png" alt="">
                            <img class="shape_ecfect" src="./assets/images/common/shape_4.svg" alt="">
                            <div class="image">
                                <img src="./assets/images/common/team_6.png" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name"><a href="team-details.html">Dianne Russell</a></h5>
                                <p class="position">Senior Designer</p>
                                <ul class="social">
                                    <li>
                                        <a href="#">
                                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.20381 22V11.9655H11.5706L12.0757 8.05372H8.20381V5.55662C8.20381 4.42442 8.51692 3.65284 10.1423 3.65284L12.212 3.65199V0.153153C11.8541 0.10664 10.6255 0 9.19548 0C6.20942 0 4.16511 1.82266 4.16511 5.1692V8.05372H0.788086V11.9655H4.16511V22H8.20381Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.5 2.17863C21.6819 2.5375 20.8101 2.77537 19.9012 2.89087C20.8363 2.33262 21.5499 1.45537 21.8854 0.398C21.0136 0.91775 20.0511 1.28488 19.0254 1.48975C18.1976 0.608375 17.0179 0.0625 15.7309 0.0625C13.2339 0.0625 11.2236 2.08925 11.2236 4.57388C11.2236 4.93138 11.2539 5.27512 11.3281 5.60237C7.5785 5.4195 4.26063 3.62238 2.03175 0.88475C1.64262 1.55988 1.41438 2.33262 1.41438 3.1645C1.41438 4.7265 2.21875 6.11112 3.41775 6.91275C2.69313 6.899 1.98225 6.68862 1.38 6.35725C1.38 6.371 1.38 6.38888 1.38 6.40675C1.38 8.5985 2.94337 10.419 4.9935 10.8384C4.62637 10.9388 4.22625 10.9869 3.811 10.9869C3.52225 10.9869 3.23075 10.9704 2.95712 10.9099C3.5415 12.696 5.19975 14.0091 7.1715 14.0518C5.637 15.2521 3.68863 15.9754 1.57938 15.9754C1.2095 15.9754 0.85475 15.9589 0.5 15.9135C2.49787 17.2019 4.86562 17.9375 7.419 17.9375C15.7185 17.9375 20.256 11.0625 20.256 5.10325C20.256 4.90387 20.2491 4.71138 20.2395 4.52025C21.1346 3.885 21.8867 3.09162 22.5 2.17863Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.3003 17.8V11.354C18.3003 8.18599 17.6183 5.76599 13.9223 5.76599C12.1403 5.76599 10.9523 6.73399 10.4683 7.65799H10.4243V6.05199H6.92627V17.8H10.5783V11.97C10.5783 10.43 10.8643 8.95599 12.7563 8.95599C14.6263 8.95599 14.6483 10.694 14.6483 12.058V17.778H18.3003V17.8Z" fill="#798DA3"/>
                                                <path d="M0.986328 6.052H4.63833V17.8H0.986328V6.052Z" fill="#798DA3"/>
                                                <path d="M2.8122 0.200012C1.6462 0.200012 0.700195 1.14601 0.700195 2.31201C0.700195 3.47801 1.6462 4.44601 2.8122 4.44601C3.9782 4.44601 4.9242 3.47801 4.9242 2.31201C4.9242 1.14601 3.9782 0.200012 2.8122 0.200012Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-box" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                            <img class="shape" src="./assets/images/common/shape_3.png" alt="">
                            <img class="shape_ecfect" src="./assets/images/common/shape_4.svg" alt="">
                            <div class="image">
                                <img src="./assets/images/common/team_7.png" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name"><a href="team-details.html">Devon Lane</a></h5>
                                <p class="position">Senior Designer</p>
                                <ul class="social">
                                    <li>
                                        <a href="#">
                                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.20381 22V11.9655H11.5706L12.0757 8.05372H8.20381V5.55662C8.20381 4.42442 8.51692 3.65284 10.1423 3.65284L12.212 3.65199V0.153153C11.8541 0.10664 10.6255 0 9.19548 0C6.20942 0 4.16511 1.82266 4.16511 5.1692V8.05372H0.788086V11.9655H4.16511V22H8.20381Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.5 2.17863C21.6819 2.5375 20.8101 2.77537 19.9012 2.89087C20.8363 2.33262 21.5499 1.45537 21.8854 0.398C21.0136 0.91775 20.0511 1.28488 19.0254 1.48975C18.1976 0.608375 17.0179 0.0625 15.7309 0.0625C13.2339 0.0625 11.2236 2.08925 11.2236 4.57388C11.2236 4.93138 11.2539 5.27512 11.3281 5.60237C7.5785 5.4195 4.26063 3.62238 2.03175 0.88475C1.64262 1.55988 1.41438 2.33262 1.41438 3.1645C1.41438 4.7265 2.21875 6.11112 3.41775 6.91275C2.69313 6.899 1.98225 6.68862 1.38 6.35725C1.38 6.371 1.38 6.38888 1.38 6.40675C1.38 8.5985 2.94337 10.419 4.9935 10.8384C4.62637 10.9388 4.22625 10.9869 3.811 10.9869C3.52225 10.9869 3.23075 10.9704 2.95712 10.9099C3.5415 12.696 5.19975 14.0091 7.1715 14.0518C5.637 15.2521 3.68863 15.9754 1.57938 15.9754C1.2095 15.9754 0.85475 15.9589 0.5 15.9135C2.49787 17.2019 4.86562 17.9375 7.419 17.9375C15.7185 17.9375 20.256 11.0625 20.256 5.10325C20.256 4.90387 20.2491 4.71138 20.2395 4.52025C21.1346 3.885 21.8867 3.09162 22.5 2.17863Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.3003 17.8V11.354C18.3003 8.18599 17.6183 5.76599 13.9223 5.76599C12.1403 5.76599 10.9523 6.73399 10.4683 7.65799H10.4243V6.05199H6.92627V17.8H10.5783V11.97C10.5783 10.43 10.8643 8.95599 12.7563 8.95599C14.6263 8.95599 14.6483 10.694 14.6483 12.058V17.778H18.3003V17.8Z" fill="#798DA3"/>
                                                <path d="M0.986328 6.052H4.63833V17.8H0.986328V6.052Z" fill="#798DA3"/>
                                                <path d="M2.8122 0.200012C1.6462 0.200012 0.700195 1.14601 0.700195 2.31201C0.700195 3.47801 1.6462 4.44601 2.8122 4.44601C3.9782 4.44601 4.9242 3.47801 4.9242 2.31201C4.9242 1.14601 3.9782 0.200012 2.8122 0.200012Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-box" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                            <img class="shape" src="./assets/images/common/shape_3.png" alt="">
                            <img class="shape_ecfect" src="./assets/images/common/shape_4.svg" alt="">
                            <div class="image">
                                <img src="./assets/images/common/team_8.png" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name"><a href="team-details.html">Robert Fox</a></h5>
                                <p class="position">Senior Designer</p>
                                <ul class="social">
                                    <li>
                                        <a href="#">
                                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.20381 22V11.9655H11.5706L12.0757 8.05372H8.20381V5.55662C8.20381 4.42442 8.51692 3.65284 10.1423 3.65284L12.212 3.65199V0.153153C11.8541 0.10664 10.6255 0 9.19548 0C6.20942 0 4.16511 1.82266 4.16511 5.1692V8.05372H0.788086V11.9655H4.16511V22H8.20381Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.5 2.17863C21.6819 2.5375 20.8101 2.77537 19.9012 2.89087C20.8363 2.33262 21.5499 1.45537 21.8854 0.398C21.0136 0.91775 20.0511 1.28488 19.0254 1.48975C18.1976 0.608375 17.0179 0.0625 15.7309 0.0625C13.2339 0.0625 11.2236 2.08925 11.2236 4.57388C11.2236 4.93138 11.2539 5.27512 11.3281 5.60237C7.5785 5.4195 4.26063 3.62238 2.03175 0.88475C1.64262 1.55988 1.41438 2.33262 1.41438 3.1645C1.41438 4.7265 2.21875 6.11112 3.41775 6.91275C2.69313 6.899 1.98225 6.68862 1.38 6.35725C1.38 6.371 1.38 6.38888 1.38 6.40675C1.38 8.5985 2.94337 10.419 4.9935 10.8384C4.62637 10.9388 4.22625 10.9869 3.811 10.9869C3.52225 10.9869 3.23075 10.9704 2.95712 10.9099C3.5415 12.696 5.19975 14.0091 7.1715 14.0518C5.637 15.2521 3.68863 15.9754 1.57938 15.9754C1.2095 15.9754 0.85475 15.9589 0.5 15.9135C2.49787 17.2019 4.86562 17.9375 7.419 17.9375C15.7185 17.9375 20.256 11.0625 20.256 5.10325C20.256 4.90387 20.2491 4.71138 20.2395 4.52025C21.1346 3.885 21.8867 3.09162 22.5 2.17863Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.3003 17.8V11.354C18.3003 8.18599 17.6183 5.76599 13.9223 5.76599C12.1403 5.76599 10.9523 6.73399 10.4683 7.65799H10.4243V6.05199H6.92627V17.8H10.5783V11.97C10.5783 10.43 10.8643 8.95599 12.7563 8.95599C14.6263 8.95599 14.6483 10.694 14.6483 12.058V17.778H18.3003V17.8Z" fill="#798DA3"/>
                                                <path d="M0.986328 6.052H4.63833V17.8H0.986328V6.052Z" fill="#798DA3"/>
                                                <path d="M2.8122 0.200012C1.6462 0.200012 0.700195 1.14601 0.700195 2.31201C0.700195 3.47801 1.6462 4.44601 2.8122 4.44601C3.9782 4.44601 4.9242 3.47801 4.9242 2.31201C4.9242 1.14601 3.9782 0.200012 2.8122 0.200012Z" fill="#798DA3"/>
                                                </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>

    <section class="tf-section tf_partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tf-title" data-aos="fade-up" data-aos-duration="800">
                        <h2 class="title">
                            Our Partners
                        </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="partner-wrapper" data-aos="fade-up" data-aos-duration="800">
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/01.png" alt="">
                        </a>
                        <a href="home-02.html" class="image ">
                            <img class="active" src="./assets/images/partner/02.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/03.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/04.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/05.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/06.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/07.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/08.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/09.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/10.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/11.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/12.png" alt="">
                        </a>
                        <a href="home-02.html" class="image style">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/13.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/14.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/15.png" alt="">
                        </a>
                        <a href="home-02.html" class="image">
                            <img src="./assets/images/partner/16.png" alt="">
                        </a>
                        <a href="home-02.html" class="image style">
                        </a>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>

    <section class="tf-section tf_CTA">

        <div class="container relative">
            <div class="overlay">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="tf-title left mt58" data-aos="fade-up" data-aos-duration="800">
                        <h2 class="title">
                            Launch on Risebot
                        </h2>
                        <p class="sub">Full support in project incubation</p>
                        <div class="wrap-btn">
                            <a href="submit-IGO-on-chain.html" class="tf-button style3">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="image_cta" data-aos="fade-left" data-aos-duration="1200">
                    <img class="move4" src="./assets/images/common/img_cta.png" alt="">
                  </div>
                </div>
            </div>
        </div>
    </section> --}}


        <footer id="footer">
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="footer-logo">
                            <div class="logo_footer">
                                <img src="./assets/images/logo/logo2.png" alt="">
                            </div>
                            <p>A one-stop destination for web3 gaming.</p>
                        </div>
                        <div class="widget">
                            <h5 class="widget-title">
                                Contact us
                            </h5>
                            <ul class="widget-link contact">
                                <li>
                                    <p>Address</p>
                                    <a href="#">1901 Thornridge Cir. Shiloh, Hawaii 81063</a>
                                </li>
                                <li>
                                    <p>Phone</p>
                                    <a href="#">+33 7 00 55 57 60</a>
                                </li>
                                <li class="email">
                                    <p>Email</p>
                                    <a href="#">risebot@support.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget support">
                            <h5 class="widget-title">
                                Support
                            </h5>
                            <ul class="widget-link">
                                <li>
                                    <a href="connect-wallet.html">Connect Wallet</a>
                                </li>
                                <li>
                                    <a href="forget-password.html">Forget Password</a>
                                </li>
                                <li>
                                    <a href="faq.html">FAQs</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget link">
                            <h5 class="widget-title">
                                Quick link
                            </h5>
                            <ul class="widget-link">
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="project-list.html">Project</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">Blog</a>
                                </li>
                                <li>
                                    <a href="team-details.html">Our Team</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="wrap-fx">
                        <div class="Copyright">
                            Copyright © 2023. Designed by <a
                                href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a>
                        </div>
                        <ul class="social">
                            <li>
                                <a href="#">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_157_2529)">
                                            <path
                                                d="M18 3.41887C17.3306 3.7125 16.6174 3.90712 15.8737 4.00162C16.6388 3.54487 17.2226 2.82712 17.4971 1.962C16.7839 2.38725 15.9964 2.68763 15.1571 2.85525C14.4799 2.13413 13.5146 1.6875 12.4616 1.6875C10.4186 1.6875 8.77387 3.34575 8.77387 5.37863C8.77387 5.67113 8.79862 5.95237 8.85938 6.22012C5.7915 6.0705 3.07687 4.60013 1.25325 2.36025C0.934875 2.91263 0.748125 3.54488 0.748125 4.2255C0.748125 5.5035 1.40625 6.63637 2.38725 7.29225C1.79437 7.281 1.21275 7.10888 0.72 6.83775C0.72 6.849 0.72 6.86363 0.72 6.87825C0.72 8.6715 1.99912 10.161 3.6765 10.5041C3.37612 10.5863 3.04875 10.6256 2.709 10.6256C2.47275 10.6256 2.23425 10.6121 2.01038 10.5626C2.4885 12.024 3.84525 13.0984 5.4585 13.1332C4.203 14.1154 2.60888 14.7071 0.883125 14.7071C0.5805 14.7071 0.29025 14.6936 0 14.6565C1.63462 15.7106 3.57188 16.3125 5.661 16.3125C12.4515 16.3125 16.164 10.6875 16.164 5.81175C16.164 5.64862 16.1584 5.49113 16.1505 5.33475C16.8829 4.815 17.4982 4.16587 18 3.41887Z"
                                                fill="#798DA3" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_157_2529">
                                                <rect width="18" height="18" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.4377 0H13.2325L6.98535 10.9429L11.0106 18H15.2159L11.1906 10.9429L17.4377 0Z"
                                            fill="#798DA3" />
                                        <path
                                            d="M5.24588 3.375H1.28138L3.57525 7.41488L0.5625 12.375H4.527L7.53975 7.41488L5.24588 3.375Z"
                                            fill="#798DA3" />
                                    </svg>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9 0.199951C6.684 0.199951 4.8 2.08395 4.8 4.39995V11.6C4.8 11.93 4.5312 12.2 4.2 12.2C3.8688 12.2 3.6 11.93 3.6 11.6V8.59995H0V11.6C0 13.916 1.884 15.8 4.2 15.8C6.516 15.8 8.4 13.916 8.4 11.6V4.39995C8.4 4.06875 8.6688 3.79995 9 3.79995C9.3312 3.79995 9.6 4.06875 9.6 4.39995V6.67875L11.4 7.87875L13.2 6.67875V4.39995C13.2 2.08395 11.316 0.199951 9 0.199951Z"
                                            fill="#798DA3" />
                                        <path
                                            d="M14.4001 8.59989V11.5999C14.4001 11.9299 14.1301 12.1999 13.8001 12.1999C13.4701 12.1999 13.2001 11.9299 13.2001 11.5999V8.12109L11.7325 9.09909C11.6317 9.16629 11.5165 9.19989 11.4001 9.19989C11.2837 9.19989 11.1685 9.16629 11.0677 9.09909L9.6001 8.12109V11.5999C9.6001 13.9159 11.4841 15.7999 13.8001 15.7999C16.1161 15.7999 18.0001 13.9159 18.0001 11.5999V8.59989H14.4001Z"
                                            fill="#798DA3" />
                                    </svg>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.3836 5.00756C10.3836 3.73634 10.8716 3.0748 11.5606 3.0748C12.2169 3.0748 12.654 3.6686 12.654 4.87208C12.654 5.5569 12.472 6.30736 12.3376 6.75085C12.3386 6.75191 12.9917 7.90035 14.7784 7.54788C15.1573 6.69899 15.3637 5.59924 15.3637 4.63498C15.3637 2.04068 14.0512 0.531311 11.6464 0.531311C9.17275 0.531311 7.72689 2.44819 7.72689 4.97475C7.72689 7.47802 8.88803 9.62776 10.8017 10.6068C9.9973 12.2295 8.9727 13.6595 7.90471 14.737C5.96772 12.3745 4.21596 9.22449 3.4962 3.07586H0.63623C1.9572 13.3165 5.89363 16.5766 6.9341 17.2032C7.5226 17.5599 8.03067 17.543 8.56837 17.2371C9.41302 16.7523 11.9512 14.195 13.3569 11.1985C13.9464 11.1964 14.6556 11.1287 15.3627 10.9667V8.95034C14.9297 9.0509 14.5117 9.09535 14.1348 9.09535C12.0147 9.09535 10.3836 7.60292 10.3836 5.00756Z"
                                            fill="#798DA3" />
                                    </svg>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.2235 4.99088C15.0649 4.938 14.9119 4.88737 14.7656 4.839C13.6451 4.47337 12.9701 4.25175 12.9701 3.34612C12.9701 2.6115 13.5157 2.07937 14.2673 2.07937C14.8433 2.07937 15.273 2.328 15.6578 2.88825C15.6938 2.94 15.7624 2.95913 15.8175 2.92875L16.9481 2.32912C16.9785 2.31337 17.0021 2.28525 17.0111 2.25037C17.0201 2.2155 17.0168 2.1795 17.001 2.148C16.3946 1.02975 15.5216 0.486375 14.3302 0.486375C12.5179 0.486375 11.3456 1.626 11.3456 3.38888C11.3456 5.19112 12.4796 5.92125 14.5699 6.63562C15.7804 7.05525 16.317 7.27687 16.317 8.17237C16.317 9.17925 15.4429 9.90263 14.2504 9.85987C13.0005 9.816 12.6225 9.12862 12.1466 8.00138C11.3411 6.09225 10.4242 3.86475 10.4164 3.84338C9.49725 1.63838 7.67362 0.375 5.4135 0.375C2.42887 0.375 0 2.89838 0 6.00113C0 9.10163 2.42887 11.625 5.4135 11.625C7.04137 11.625 8.568 10.8757 9.60075 9.56737C9.63 9.52912 9.63788 9.47738 9.61875 9.43237L8.937 7.79663C8.91787 7.75163 8.874 7.72013 8.82562 7.71788C8.77612 7.71563 8.73225 7.74375 8.70975 7.78762C8.06513 9.06675 6.80175 9.861 5.4135 9.861C3.36487 9.861 1.69875 8.12962 1.69875 6C1.69875 3.87037 3.36487 2.139 5.4135 2.139C6.90525 2.139 8.271 3.05813 8.81437 4.43062L10.503 8.43L10.6976 8.87887C11.4604 10.725 12.582 11.553 14.3381 11.5598C16.4261 11.5598 18 10.122 18 8.21625C18 6.30488 16.9819 5.58713 15.2235 4.99088Z"
                                            fill="#798DA3" />
                                    </svg>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </footer>
         @livewire('landig-page.preinscripcion-index')
        

    </div>
    <a id="scroll-top"></a>

    <script src="{{ asset('assets/risebothtml/app/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/risebothtml/app/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/risebothtml/app/js/swiper.js') }}"></script>
    <script src="{{ asset('assets/risebothtml/app/js/app.js') }}"></script>
    <script src="{{ asset('assets/risebothtml/app/js/jquery.easing.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets/risebothtml/app/js/parallax.js') }}"></script>
    <script src="{{ asset('assets/risebothtml/app/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/risebothtml/app/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/risebothtml/app/js/count-down.js') }}"></script>
    <script src="{{ asset('assets/risebothtml/app/js/countto.js') }}"></script>
    <script src="{{ asset('assets/risebothtml/app/js/chart.js') }}"></script>
    <script src="{{ asset('assets/alertas/sweetalert2.all.min.js') }}"></script>
    <script>
        Livewire.on('alert', function(message) {
            Swal.fire(
                'Guardado con exito!',
                message,
                'success'
            )
        })
        Livewire.on('error', function(message) {
            Swal.fire(
                'Error!',
                message,
                'error'
            )
        })
         Livewire.on('errorvalidate', function(message) {
            Swal.fire(
                'Error!',
                message,
                'error'
            )
        })
    </script>
    @stack('navi-js-front')
</body>

</html>
